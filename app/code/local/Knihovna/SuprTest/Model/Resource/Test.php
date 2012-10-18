<?php
class Knihovna_SuprTest_Model_Resource_Test extends Mage_Core_Model_Resource_Db_Abstract
{
    public function _construct(){
        parent::_construct();
        $this->_init('suprtest/test','test_id');
    }
}
