<?php

class Knihovna_SuprTest_Model_Resource_Test_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    public function _construct(){
        parent::_construct();
        $this->_init('suprtest');
    }
}
