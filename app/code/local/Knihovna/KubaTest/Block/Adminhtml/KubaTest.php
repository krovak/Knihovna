<?php

class Knihovna_KubaTest_Block_Adminhtml_KubaTest extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function _construct(){
        $this->_controller = 'adminhtml_kubaTest';
        $this->_blockGroup = 'kubatest';
        parent::_construct();
    }

    public function getHeaderText(){
        return Mage::helper('knihovna_kubatest')->__('Test');
    }
}