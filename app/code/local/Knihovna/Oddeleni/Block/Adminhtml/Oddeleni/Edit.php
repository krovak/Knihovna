<?php
/**
 * Created by JetBrains PhpStorm.
 * User: altpetr
 * Date: 29.11.12
 * Time: 14:59
 * To change this template use File | Settings | File Templates.
 */

class Knihovna_Oddeleni_Block_Adminhtml_Oddeleni_Edit extends Mage_Adminhtml_Block_Widget_Form_Container {


    public function _construct(){
    $this->_objectId='id';
    $this->_controller='adminhtml_oddeleni';
    $this->_blockGroup='oddeleni';
    parent::_construct();
}
    public function getHeaderText(){
    return 'Přidat záznam';
}
}