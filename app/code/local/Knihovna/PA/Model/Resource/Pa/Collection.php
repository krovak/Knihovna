<?php
class Knihovna_PA_Model_Resource_Pa_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract {
    public function _construct(){
               $this->_init('pa');
    }
}
