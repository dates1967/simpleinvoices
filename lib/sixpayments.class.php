<?php

class SIXPayment extends SIXModule {
	private $default = "";
	private $filter = "";
	private $request = "";

	public function __construct(){
		try {
			parent::__construct();
			$this->default = $this->template_dir . '/' . $this->module . '/default.tpl';
			$this->query_string = $_SERVER[QUERY_STRING];
			$this->filter = isset($_REQUEST['filter'])?$_REQUEST['filter']:false;

			if(!empty($_REQUEST['request'])){
				$this->request = $_REQUEST['request'];
			} 
			switch($this->request){
			case "add":
				$this->add();
				break;
			case "edit":
				$this->edit();
				break;
			case "delete":
				$this->delete();
				break;
			case "view":
				$this->view();
				break;
			case "manage":
				$this->manage();
				break;
			default:
				$this->manage();
			}
			$module['template_dir'] = $this->template_dir;
			$module['name'] = $this->module;
			$this->engine->assign("module", $module);

		} catch(Exception $e) {
			echo '<p style="color:red;font-weight:bold">Exception: </p>';
			echo '<p style="color:green">' . $e->getMessage() . '</p>';
		}
	}

	public function add(){
	}
	public function delete(){
	}
	public function edit(){
	}
	public function view(){
	}
	public function manage(){
		$this->engine->assign("title", ucfirst($this->module));
	}
}
