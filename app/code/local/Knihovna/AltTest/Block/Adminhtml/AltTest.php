<?php
class Knihovna_AltTest_Block_Adminhtml_AltTest extends Mage_Adminhtml_Block_Widget_Grid_Container
{
   public function _construct(){
        $this->_controller = 'adminhtml_altTest';
        $this->_blockGroup = 'alttest';
        parent::_construct();
    }

    public function getHeaderText(){
        return Mage::helper('knihovna_alttest')->__('Test');
    }
}
