<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mimo (Michal Moc)
 * Date: 29.11.12
 * Time: 14:59
 * www: http://www.iguru.eu
 * email: info@iguru.eu
 */
 
class Knihovna_Mitest_Block_Adminhtml_Mitest_Edit
        extends Mage_Adminhtml_Block_Widget_Form_Container {

    public function _construct(){
            $this->_objectId='entity_id';
            $this->_controller='adminhtml_mitest';
            $this->_blockGroup='mitest';
            parent::_construct();
        }
        public function getHeaderText(){
            return 'Přidat záznam';
        }

}