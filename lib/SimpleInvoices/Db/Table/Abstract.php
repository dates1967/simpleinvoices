<?php
/**
* This class only adds the SimpleInvoices prefix to the table.
* 
* All Simple Invoices tables inherit from this class, so only global
* actions must be implemented here.
*/
class SimpleInvoices_Db_Table_Abstract extends Zend_Db_Table_Abstract
{
    /**
     * This will automatically set table name with prefix from bootstrap file
     * @return void
     */
    protected function _setupTableName()
    {
        parent::_setupTableName(); 
        if (Zend_Registry::isRegistered('tbl_prefix')) {
            $this->_name = Zend_Registry::get('tbl_prefix') . $this->_name;
        }
    }
    
    /**
     * Get the table prefix.
     * @return string A string representing the table prefix
     */
    public static function getTablePrefix()
    {
    	if (Zend_Registry::isRegistered('tbl_prefix')) {
    		return Zend_Registry::get('tbl_prefix');
    	} else {
    		return "";
    	}
    }
    
    /**
    * Get the last insert id for the current table
    * 
    */
    public function getLastInsertId() {
        return $this->getAdapter()->lastInsertId($this->_name);
    }
    
    /**
    * Returns a new instance of the table
    * 
    */
    public static function fieldExists($fieldName)
    {
    	
        $table = new static();
        $cols = $table->info(SimpleInvoices_Db_Table_Abstract::COLS);
        return in_array($fieldName, $cols);
    }
    
    /**
    * Returns last inserted id statically
    */
    public static function LAST_INSERT_ID()
    {
        $table = new static();
        return $table->getLastInsertedId();
    }
}
?>
