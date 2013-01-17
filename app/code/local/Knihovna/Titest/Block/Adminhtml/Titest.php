<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tichave4
 * Date: 22.11.12
 * Time: 14:50
 * To change this template use File | Settings | File Templates.
 */
class Knihovna_Titest_Block_Adminhtml_Titest extends Mage_Adminhtml_Block_Widget_Grid_Container{
    public function _construct(){
        $this->_controller='adminhtml_titest';
        $this->_blockGroup='titest';
        parent::_construct();
    }
    public function getHeaderText(){
        return 'Přidat záznam';
    }
}