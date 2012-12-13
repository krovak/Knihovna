<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tichave4
 * Date: 29.11.12
 * Time: 14:59
 * To change this template use File | Settings | File Templates.
 */
class Knihovna_Titest_Block_Adminhtml_Titest_Edit extends Mage_Adminhtml_Block_Widget_Form_Container{
    public function _construct(){
        $this->objectId='entity_id';
        $this->_controller='adminhtml_titest';
        $this->_blockGroup='titest';
        parent::_construct();
    }
    public function getHeaderText(){
        return 'Pridat zaznam';
    }
}