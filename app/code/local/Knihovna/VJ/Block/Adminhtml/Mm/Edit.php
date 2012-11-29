<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mimo (Michal Moc)
 * Date: 15.11.12
 * Time: 14:32
 * www: http://www.iguru.eu
 * email: info@iguru.eu
 */
 
class Knihovna_MM_Block_Adminhtml_Mm_Edit extends Mage_Adminhtml_Block_Widget_Form_Container {
    public function _construct(){
        $this->_objectId='entity_id';
        $this->_controller='adminhtml_mm';
        $this->_blockGroup='mm';
        parent::_construct();
    }
    public function getHeaderText(){
        return 'Přidat záznam';
    }
}