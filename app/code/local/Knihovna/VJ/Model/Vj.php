<?php

class Knihovna_VJ_Model_Vj extends Mage_Core_Model_Abstract {
    public function _construct(){
      parent::_construct();
         $this->_init('vj/vj');
    }

}
