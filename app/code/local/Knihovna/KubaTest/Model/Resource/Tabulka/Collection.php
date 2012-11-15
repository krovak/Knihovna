<?php

class Knihovna_KubaTest_Model_Resource_KubaTest_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    public function _construct(){
        $this->_init('knihovna_kubatest/knihovna_kubatest');
    }
}