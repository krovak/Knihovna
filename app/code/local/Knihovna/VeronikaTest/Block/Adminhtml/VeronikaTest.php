<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tichave4
 * Date: 1.11.12
 * Time: 14:36
 * To change this template use File | Settings | File Templates.
 */
class Knihovna_VeronikaTest_Block_Adminhtml_VeronikaTest extends  Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function _construct(){
               $this->_controller = 'adminhtml_VeronikaTest';
                $this->_blockGroup = 'veronikatest';
               parent::_construct();
    }

    public function getHeaderText(){
        return Mage::helper('knihovna_veronikatest')->__('Test');
   }
}
