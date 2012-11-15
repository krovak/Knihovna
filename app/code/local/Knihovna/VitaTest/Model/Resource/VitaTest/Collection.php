<?php

class Knihovna_VitaTest_Model_Resource_VitaTest_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    public function _construct(){
        $this->_init('knihovna_vitatest/knihovna_vitatest');
    }
}