<?php
require_once(SIX_LIB_DIR . '/six.module.class.php');

class SIXProducts extends SIXModule {

	protected $products = null;
	protected $product = null;
	private $productID = "";

	function __construct(){
		parent::__construct();
		if($this->view == 'add'){
			$this->add();
		} elseif($this->view == 'manage'){
			$this->manage();
		} elseif($this->view == 'edit'){
			$this->edit();
		} elseif($this->view == 'details'){
			$this->details();
		} elseif($this->view == 'save'){
			$this->process();
		}
	}

	public function manage(){
		$this->products = $this->getProducts();
		$this->engine->assign("products", $this->products);
	}

	public function add(){
		$this->products = $this->getProducts();
		$this->engine->assign("products", $this->products);
		$scripts = array();
		$scripts[] = '<script type="text/javascript" src="./include/autocomplete/dimensions.js"></script>';
		$scripts[] = '<script type="text/javascript" src="./include/autocomplete/jquery.autocomplete.js"></script>';
		$scripts[] = '<script type="text/javascript" src="./include/autocomplete/jquery.bgiframe.min.js"></script>';
		$scripts[] = '<link rel="stylesheet" type="text/css" href="./include/autocomplete/main.css" />';
		$scripts[] = '<link rel="stylesheet" type="text/css" href="./include/autocomplete/jquery.autocomplete.css" />';
		$scripts[] = '<script type="text/javascript" src="./include/jquery/jquery.products.js"></script>';
		$scripts[] = '<script src="./include/js/jquery.validate.pack.js" type="text/javascript"></script>';
		foreach($scripts as $script){
			$this->templates->insertScript($script);
		}
	}

	public function edit(){
		$this->productID = $_REQUEST['submit'];
		if($this->productID){
			$this->product = $this->getProduct($this->productID);
			$this->engine->assign('product', $this->product);
		}
		$this->engine->assign('edit', true);
		$this->templates->set('module', $this->template_dir . '/' . $this->module . '/add.tpl');
		$this->add();
	}

	public function details(){
		$this->productID = $_REQUEST['submit'];
		if($this->productID){
			$this->product = $this->getProduct($this->productID);
			$this->engine->assign('product', $this->product);
		}
	}

	public function process(){

		$product = array();
		$product['reference'] = $_REQUEST['reference']?$_REQUEST['reference']:'';
		$product['description'] = $_REQUEST['description']?$_REQUEST['description']:'';
		$product['type'] = $_REQUEST['type']?$_REQUEST['type']:'';
		$product['last_unit_cost'] = $_REQUEST['last_unit_cost']?$_REQUEST['last_unit_cost']:0;
		$product['us_retail'] = $_REQUEST['us_retail']?$_REQUEST['us_retail']:0;
		$product['price_level_A'] = $_REQUEST['price_level_A']?$_REQUEST['price_level_A']:0;
		$product['price_level_B'] = $_REQUEST['price_level_B']?$_REQUEST['price_level_B']:0;
		$product['price_level_C'] = $_REQUEST['price_level_C']?$_REQUEST['price_level_C']:0;
		$product['price_level_D'] = $_REQUEST['price_level_D']?$_REQUEST['price_level_D']:0;
		$product['notes'] = $_REQUEST['notes']?$_REQUEST['notes']:'';
		$product['enabled'] = $_REQUEST['enabled']?$_REQUEST['enabled']:1;

		if($_REQUEST['id']){
			// Update
			$sql = "UPDATE genlu_products SET ";
			$count = 0;
			foreach($product as $field => $value){
				if($count == count($product) -1){
					$sql .= "$field = '$value' ";
					break;
				} else {
					$sql .= "$field = '$value', ";
				}
				$count++;
			}
			$sql .= "WHERE id = {$_REQUEST['id']}";
			$result =& $this->db->exec($sql);
			if(MDB2::isError($result)){
				die($result->getMessage() . $result->getUserinfo());
			}
			$affectedRows = $result;
		} else {
			// Insert
			$product['id'] = '';
			$product['qty_hand'] = 0;
			$types = array(
				'',
				'text',
				'text',
				'text',
				'decimal',
				'decimal',
				'decimal',
				'decimal',
				'decimal',
				'decimal',
				'integer',
				'text',
				'text'
			);
			$preSql = 'INSERT INTO genlu_products VALUES (
				:id,
				:reference,
				:description,
				:type,
				:last_unit_cost,
				:us_retail,
				:price_level_A,
				:price_level_B,
				:price_level_C,
				:price_level_D,
				:qty_hand,
				:notes,
				:enabled
			)';
			$statement = $this->db->prepare($preSql, $types, MDB2_PREPARE_MANIP);
			$affectedRows = $statement->execute($product);
			if(MDB2::isError($affectedRows)){
				die($affectedRows->getMessage() . $affectedRows->getUserinfo());
			}

			$statement->free();
		}
		if($affectedRows > 0){
			$response = "Successfully apllied changes.<br />";
			$response .= "Edited / Inserted: $affectedRows entries.";
		} else {
			$response = "No changes made to database ...<br />";
		}
		$refresh = "<META HTTP-EQUIV=REFRESH CONTENT=1;URL=index.php?module={$this->module}&view=manage>";
		$this->engine->assign("response", $response);
		$this->engine->assign("refresh", $refresh);
	}
}
?>
