<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tichave4
 * Date: 29.11.12
 * Time: 14:59
 */
class Knihovna_Ctenar_Block_Adminhtml_Ctenar_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function _construct()
    {
        $this->objectId    = 'entity_id';
        $this->_controller = 'adminhtml_ctenar';
        $this->_blockGroup = 'ctenar';
        parent::_construct();
    }

    public function getHeaderText()
    {
        return 'Přidat záznam';
    }
}