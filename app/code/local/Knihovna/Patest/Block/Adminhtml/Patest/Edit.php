<?php
/**
 * Created by JetBrains PhpStorm.
 * User: altpetr
 * Date: 29.11.12
 * Time: 14:59
 * To change this template use File | Settings | File Templates.
 */

class Knihovna_Patest_Block_Adminhtml_Patest_Edit extends Mage_Adminhtml_Block_Widget_Form_Container {


    public function _construct(){
    $this->objectId='entity_id';
    $this->_controller='adminhtml_patest';
    $this->_blockGroup='patest';
    parent::_construct();
}
    public function getHeaderText(){
    return 'Přidat záznam';
}
}