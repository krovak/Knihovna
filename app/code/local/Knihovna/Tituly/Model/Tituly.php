<?php

class Knihovna_Tituly_Model_Tituly extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
      parent::_construct();
         $this->_init('tituly/tituly');
    }

}
