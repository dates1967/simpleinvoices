<?php
class SimpleInvoices_Db_Table_PaymentTypes extends SimpleInvoices_Db_Table_Abstract
{
    protected $_name = "payment_types";
    protected $_primary = array('domain_id', 'pt_id');
    
    public function fetchAll()
    {
        global $LANG;
        
        $auth_session = Zend_Registry::get('auth_session');
        
        $select = $this->select();
        $select->where('domain_id = ?', $auth_session->domain_id);
        $select->order('pt_description');
        
        $result = $this->getAdapter()->fetchAll($select);
        
        $payment_types = array();

        foreach ($result as $payment_type) {
            if ($payment_type['enabled'] == 1) {
                $payment_type['enabled'] = $LANG['enabled'];
            } else {
                $payment_type['enabled'] = $LANG['disabled'];
            }

            // Add to payment types array
            $payment_types[] = $payment_type;
        }

        return $payment_types;
    }
    
    public function fetchAllActive()
    {
        global $LANG;
        
        $auth_session = Zend_Registry::get('auth_session');
        
        $select = $this->select();
        $select->where('domain_id = ?', $auth_session->domain_id);
        $select->where('pt_enabled = ?', 1);
        $select->order('pt_description');
        
        $result = $this->getAdapter()->fetchAll($select);
        
        $payment_types = array();

        foreach ($result as $payment_type) {
            if ($payment_type['enabled'] == 1) {
                $payment_type['enabled'] = $LANG['enabled'];
            } else {
                $payment_type['enabled'] = $LANG['disabled'];
            }

            // Add to payment types array
            $payment_types[] = $payment_type;
        }

        return $payment_types;
    }
    
    public function getPaymentTypeById($id)
    {
        global $LANG;
        
        $auth_session = Zend_Registry::get('auth_session');
        
        $select = $this->select();
        $select->where('pt_id = ?', $id);
        $select->where('domain_id = ?', $auth_session->domain_id);
        
        $payment_type = $this->getAdapter()->fetchRow($select);
        
        if($payment_type) {
            $payment_type['wording_for_enabled'] = $payment_type['enabled']==1?$LANG['enabled']:$LANG['disabled'];    
        }
        
        return $payment_type;
    }
    
    public function findByName($name)
    {
        global $LANG;
        
        $auth_session = Zend_Registry::get('auth_session');
        
        $select = $this->select();
        $select->where('pt_description = ?', $name);
        $select->where('domain_id = ?', $auth_session->domain_id);
        
        $payment_type = $this->getAdapter()->fetchRow($select);
        
        if($payment_type) {
            $payment_type['wording_for_enabled'] = $payment_type['enabled']==1?$LANG['enabled']:$LANG['disabled'];    
        }
        
        return $payment;
    }
    
    /**
    * Get the default payment type
    * 
    */
    public function getDefault()
    {
        $tbl_system_defaults = Zend_Registry::get('tbl_prefix') . 'system_defaults';
        $auth_session = Zend_Registry::get('auth_session');
        
        $select = $this->select();
        $select->from($this->_name)
            ->joinInner($tbl_system_defaults, $tbl_system_defaults.'.value = ' . $this->_name . '.pt_id', array());
        $select->where($tbl_system_defaults . ".name = ?", "payment_type");
        $select->where($this->_name . '.domain_id = ?', $auth_session->domain_id);
        
        return $this->getAdapter()->fetchRow($select);
    }
}
?>
