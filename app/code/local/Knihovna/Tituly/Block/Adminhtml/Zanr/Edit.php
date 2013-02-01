<?php
/**
 * User: tichave4
 * Date: 20.12.12
 * Time: 13:34
 */
class Knihovna_Tituly_Block_Adminhtml_Zanr_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function _construct()
    {
        $this->objectId    = 'id';
        $this->_controller = 'adminhtml_zanr';
        $this->_blockGroup = 'tituly';
        parent::_construct();
    }

    public function getHeaderText()
    {
        return 'Přidat záznam';
    }
}