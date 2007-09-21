<?php

require_once 'MDB2.php';
include_once 'Var_Dump.php';
require_once 'Log.php';

class Authentication {

   // {{{ constants
   const AUTH_SUCCESS = 1;
   const AUTH_WRONG_LOGIN = -1;
   const AUTH_SECURITY_BREACH = -1;
   // }}}
   // {{{ members
   private $expire = 0;
   private $expired = false;
   private $idle = 0;
   private $idled = false;

   private $allowLogin = false;
   private static $checks = 0;
   private $status = "";

   private $username = null;
   private $password = null;
   private $logged = null;

   private $auth_tbl = "auth";

   private $session = null;
   private $server = null;
   private $post = null;
   private $cookie = null;
   private $sessionName = 'genluAuthSession';

   private $dsn = "";
   private $db = null;
   // }}}
   // {{{ constructor.
   function __construct(){

      if(!session_id()){
         // @session_start();
			session_start();
         if(!session_id()){
				throw new Exception('Session could not be started by Auth');
			}
         if(!isset($_SESSION[$this->sessionName])){
            $_SESSION[$this->sessionName] = array();
         }
		}
		$this->logged = false;
        // $this->session =& $_SESSION[$this->sessionName];
	  	$this->session =& $_SESSION;
      $this->server =& $_SERVER;
      $this->post =& $_POST;
      $this->cookie =& $_COOKIE;
      /* Logger */
 		$conf = array('buffering' => false, 'append' => true);
 		$this->logger = &Log::singleton('file', 'log/auth.log', 'SIX', $conf);
      $this->logger->debug("########## " . __CLASS__ . "::" . __FUNCTION__ . " ##########");
      $this->logEnter(__CLASS__, __FUNCTION__);
      /* DB */
      $this->dsn = "mysql://german:2921@localhost/genluStable";
      $this->db =& MDB2::factory($this->dsn);
		if (MDB2::isError($this->db))
			die (__LINE__.$this->db->getMessage());
		$this->db->setFetchMode(MDB2_FETCHMODE_ASSOC);
      $this->logExit(__CLASS__, __FUNCTION__);
	}
	// }}}
   // {{{ destructor
   function __destruct(){
      $this->logEnter(__CLASS__, __FUNCTION__);
	   $this->logged = null;
	   $this->username = null;
	   $this->password = null;
      $this->logExit(__CLASS__, __FUNCTION__);
   }
   // }}}
   // {{{ login
   public function login($user, $pass){
      $this->logEnter(__CLASS__, __FUNCTION__);
		if($user && $pass){
			$sql = "SELECT * FROM `{$this->auth_tbl}` WHERE username = '$user'";
			$result = $this->queryRow($sql);
			if($result){
				if($result['password'] == $pass){
					$this->password = $pass;
					$this->username = $user;
					$this->logged = true;
				}
			} else {
            $this->logger->debug(__CLASS__ . '::' . __FUNCTION__ . ' called.');
			}
         // $this->dump($this);
		} else {
			$this->logger->warn("Called " . __CLASS__ . "::" . __FUNCTION__ . " without arguments.");
		}
      $this->logExit(__CLASS__, __FUNCTION__);
   }
   // }}}
   // {{{ logout
   public function logout(){
      $this->logEnter(__CLASS__, __FUNCTION__);
      $this->session = null;
      $this->username = null;
      $this->password = null;
      $this->logged = false;
      $this->checks = 0;
      $this->status = '';
      $this->logExit(__CLASS__, __FUNCTION__);
   }
   // }}}
   // {{{ checkLogged
   public function checkLogged(){
      $this->logEnter(__CLASS__, __FUNCTION__);
      $this->logExit(__CLASS__, __FUNCTION__);
      return $this->logged; 
   }
   // }}}
   // {{{ getUser
   public function getUser(){
      $this->logEnter(__CLASS__, __FUNCTION__);
      $this->logExit(__CLASS__, __FUNCTION__);
	   return $this->username;
   }
   // }}}
   // {{{ dump
   public function dump($mixed){
      $this->logEnter(__CLASS__, __FUNCTION__);
      Var_Dump::displayInit(array('display_mode' => 'HTML4_Table'));
      Var_Dump::display($mixed);
      $this->logExit(__CLASS__, __FUNCTION__);
   }
   // }}}
   // {{{ queryRow
	protected function queryRow($sql){
      $this->logEnter(__CLASS__, __FUNCTION__);
		$sql = utf8_encode($sql);
		$result =& $this->db->query($sql);
      if(MDB2::isError($result)){
         $this->prettyError(&$result);
			$this->logger->err($result->getMessage() . "\n" . $result->getUserinfo());
			exit();
		} else {
			$row = $result->fetchRow();
			$this->logger->debug("QueryRow:\nSQL: $sql\nResult: " . print_r($row));
			if($result->numRows() != 1){
				$this->logger->warning("More than 1 result in queryOne.");
			}
			$result->free();
		}
      $this->logExit(__CLASS__, __FUNCTION__);
		return $row;
   }
   // }}}
   // {{{ prettyError
   private function prettyError(&$result){
      $this->logEnter(__CLASS__, __FUNCTION__);
      echo <<<EOD
			<p style='color:red;font-weight:bold'>
			{$result->getMessage()}
			</p>
			<p style='color:blue;font-weight:bold'>
			{$result->getUserinfo()}
			</p>
EOD;
      $this->logExit(__CLASS__, __FUNCTION__);
   }
   // }}}
   // {{{ logEnter
   private function logEnter($class, $function){
      $this->logger->debug(">> $class::$function.");
   }
   // }}}
   // {{{ logExit
   private function logExit($class, $function){
      $this->logger->debug("<< $class::$function.");
   }
   // }}}

}

/* vim: set expandtab tabstop=3 shiftwidth=3 softtabstop=3 foldmethod=marker cms=//%s: */
?>
