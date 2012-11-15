<?php
class Knihovna_PA_Block_Adminhtml_Mm extends Mage_Adminhtml_Block_Widget_Grid_Container {

    public function _construct(){
                $this->_controller='adminhtml_pa';
                $this->_blockGroup='pa';
                parent::_construct();
    }
    public function getHeaderText(){
        return 'Pokus';
    }
}
