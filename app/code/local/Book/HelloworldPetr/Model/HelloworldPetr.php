<?php
class Book_HelloworldPetr_Model_HelloworldPetr extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('helloworldPetr/helloworldPetr');
    }
}