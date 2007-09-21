<?php
require_once(SIX_LIB_DIR . '/six.module.class.php');

class SIXCustomers extends SIXModule {
	private $customers = null;
	private $customer = null;

	function __construct(){
		parent::__construct();

		if($this->view == 'manage'){
			$this->manage();
		} elseif($this->view == 'add'){
			$this->add();
		} elseif($this->view == 'details'){
			$this->view();
		} elseif($this->view == 'edit') {
			$this->edit();
		} elseif($this->view == 'save') {
			$this->process();
		}
	}

	public function manage(){
		$this->customers = $this->getCustomers();
		$this->engine->assign('customers', $this->customers);
	}

	public function add(){
		$this->setupScripts('autocomplete');
	}

	public function view(){
		$this->customer = $this->getCustomer($this->id);
		$this->engine->assign('customer', $this->customer);
	}

	public function edit(){
		/* TODO */
		$this->setupScripts('autocomplete');
		$this->customer = $this->getCustomer($this->id);
		$this->engine->assign('customer', $this->customer);
	}

	/* SAVE */
	public function process(){
		$customer = array();
		extract($_REQUEST, EXTR_PREFIX_ALL, 'req');
		$customer['name'] = utf8_encode($req_name);
		$customer['customer_short_id'] = $req_customer_short_id;
		$customer['attention'] = utf8_encode($req_attention);
		$customer['street_address'] = utf8_encode($req_street_address);
		$customer['street_address2'] = utf8_encode($req_street_address2);
		$customer['city'] = utf8_encode($req_city);
		$customer['state'] = utf8_encode($req_state);
		$customer['zip_code'] = $req_zip_code;
		$customer['country'] = $req_country;
		$customer['phone'] = $req_phone;
		$customer['mobile_phone'] = $req_mobile_phone;
		$customer['fax'] = $req_fax;
		$customer['email'] = $req_email;
		$customer['website'] = $req_website;
		$customer['shipping_address'] = utf8_encode($req_shipping_address);
		$customer['shipping_address2'] = utf8_encode($req_shipping_address2);
		$customer['shipping_city'] = utf8_encode($req_shipping_city);
		$customer['shipping_state'] = utf8_encode($req_shipping_state);
		$customer['shipping_zip_code'] = utf8_encode($req_shipping_zip_code);
		$customer['shipping_country'] = utf8_encode($req_shipping_country);
		$customer['shipping_phone'] = $req_shipping_phone;
		$customer['shipping_fax'] = $req_shipping_fax;
		$customer['shipping_email'] = $req_shipping_email;
		$customer['notes'] = utf8_encode($req_notes);
		$customer['enabled'] = $req_enabled;
//         $this->dump($customer);
		if($_REQUEST['id']){
			// Update
			$sql = "UPDATE genlu_customers SET ";
			$count = 0;
			foreach($customer as $field => $value){
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
			$customer['id'] = '';
			$types = array(
				'',
				'text',
				'text',
				'text',
				'text',
				'text',
				'text',
				'text',
				'text',
				'text',
				'text',
				'text',
				'text',
				'text',
				'text',
				'text',
				'text',
				'text',
				'text',
				'text',
				'text',
				'text',
				'text',
				'text',
				'text',
				'text'
			);
			$preSql = 'INSERT INTO genlu_customers VALUES (
				:id,
				:customer_short_id,
				:attention,
				:name,
				:street_address,
				:street_address2,
				:city,
				:state,
				:zip_code,
				:country,
				:phone,
				:mobile_phone,
				:fax,
				:email,
				:website,
				:shipping_address,
				:shipping_address2,
				:shipping_city,
				:shipping_state,
				:shipping_zip_code,
				:shipping_country,
				:shipping_phone,
				:shipping_fax,
				:shipping_email,
				:notes,
				:enabled
			)';
			$statement = $this->db->prepare($preSql, $types, MDB2_PREPARE_MANIP);
			$affectedRows = $statement->execute($customer);
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
