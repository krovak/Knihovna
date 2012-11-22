<?php

class Knihovna_VJ_Block_Adminhtml_Vj_Edit extends Mage_Adminhtml_Block_Widget_Form_Container {
    public function _construct(){
        $this->_objectId='entity_id';
        $this->_controller='adminhtml_vj';
        $this->_blockGroup='vj';
        parent::_construct();
    }
    public function getHeaderText(){
        return 'Přidat záznam';
    }
}