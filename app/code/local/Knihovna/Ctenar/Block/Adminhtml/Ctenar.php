<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tichave4
 * Date: 22.11.12
 * Time: 14:50
 */
class Knihovna_Ctenar_Block_Adminhtml_Ctenar extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function _construct()
    {
        $this->_controller = 'adminhtml_ctenar';
        $this->_blockGroup = 'ctenar';
        parent::_construct();
    }

    public function getHeaderText()
    {
        return 'Přidat záznam';
    }
}