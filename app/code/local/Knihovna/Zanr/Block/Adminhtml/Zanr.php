<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tichave4
 * Date: 20.12.12
 * Time: 13:37
 * To change this template use File | Settings | File Templates.
 */
class Knihovna_Zanr_Block_Adminhtml_Zanr extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function _construct()
    {
        $this->_controller = 'adminhtml_zanr';
        $this->_blockGroup = 'zanr';
        parent::_construct();
    }

    public function getHeaderText()
    {
        return 'Přidat žánr';
    }
}