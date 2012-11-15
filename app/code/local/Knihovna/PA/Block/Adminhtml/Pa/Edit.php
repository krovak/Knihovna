<?php
class Knihovna_PA_Block_Adminhtml_Pa_Edit extends Mage_Adminhtml_Block_Widget_Form_Container {
    public function _construct(){
                $this->_objectId='entity_id';
                $this->_controller='adminhtml_pa';
                $this->_blockGroup='pa';
                parent::_construct();
    }
    public function getHeaderText(){
        return 'Přidat záznam';
    }
}
