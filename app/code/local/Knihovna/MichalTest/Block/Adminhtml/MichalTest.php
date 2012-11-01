<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mimo (Michal Moc)
 * Date: 1.11.12
 * Time: 14:18
 * www: http://www.iguru.eu
 * email: info@iguru.eu
 */
 
class Knihovna_MichalTest_Block_Adminhtml_MichalTest extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function _construct(){
        $this->_controller = 'adminhtml_michalTest';
        $this->_blockGroup = 'michaltest';
        parent::_construct();
    }

    public function getHeaderText(){
        return Mage::helper('knihovna_michaltest')->__('Test');
    }
}