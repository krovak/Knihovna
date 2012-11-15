<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mimo (Michal Moc)
 * Date: 1.11.12
 * Time: 14:18
 * www: http://www.iguru.eu
 * email: info@iguru.eu
 */
 
class Knihovna_VitaTest_Block_Adminhtml_VitaTest extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function _construct(){
        $this->_controller = 'adminhtml_vitaTest';
        $this->_blockGroup = 'vitatest';
        parent::_construct();
    }

    public function getHeaderText(){
        return Mage::helper('knihovna_vitatest')->__('Test');
    }
}