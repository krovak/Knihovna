<?php

class Knihovna_Tituly_Model_Zanr extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('tituly/zanr');
    }

}