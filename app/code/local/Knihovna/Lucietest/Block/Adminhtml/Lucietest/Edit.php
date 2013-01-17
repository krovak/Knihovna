<?php
/**
 * Created by JetBrains PhpStorm.
 * User: sobotluc
 * Date: 29.11.12
 * Time: 14:59
 * To change this template use File | Settings | File Templates.
 */
class Knihovna_Lucietest_Block_Adminhtml_Lucietest_Edit extends Mage_Adminhtml_Block_Widget_Form_Container {

    public function _construct(){
        $this->_objectId='entity_id';
        $this->_controller='adminhtml_lucietest';
        $this->_blockGroup='lucietest';
        parent::_construct();
    }
    public function getHeaderText(){
        return 'Pridat zaznam';
    }
}