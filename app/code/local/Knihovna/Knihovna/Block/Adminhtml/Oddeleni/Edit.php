<?php
/**
 * Created by JetBrains PhpStorm.
 * User: altpetr
 * Date: 29.11.12
 * Time: 14:59
 */
class Knihovna_Knihovna_Block_Adminhtml_Oddeleni_Edit extends Mage_Adminhtml_Block_Widget_Form_Container {


    public function _construct(){
    $this->_objectId='id';
    $this->_controller='adminhtml_oddeleni';
    $this->_blockGroup='knihovna';
    parent::_construct();
}
    public function getHeaderText(){
    return 'Přidat záznam';
}
}