<?php
/**
 * User: tichave4
 * Date: 20.12.12
 * Time: 13:37
 */
class Knihovna_Tituly_Block_Adminhtml_Zanr extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function _construct()
    {
        $this->_controller = 'adminhtml_zanr';
        $this->_blockGroup = 'tituly';
        parent::_construct();
    }

    public function getHeaderText()
    {
        return 'Žánry';
    }
}