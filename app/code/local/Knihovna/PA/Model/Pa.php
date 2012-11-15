<?php
class Knihovna_PA_Model_Pa extends Mage_Core_Model_Abstract {
    public function _construct(){
              parent::_construct();
                 $this->_init('pa/pa');
    }

}
