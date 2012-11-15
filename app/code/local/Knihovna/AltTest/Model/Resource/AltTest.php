<?php

class Knihovna_AltTest_Model_Resource_AltTest extends Mage_Core_Model_Resource_Db_Abstract
{
    public function _construct(){
               $this->_init('knihovna_alttest/knihovna_alttest','entitiy_id');
    }
}
