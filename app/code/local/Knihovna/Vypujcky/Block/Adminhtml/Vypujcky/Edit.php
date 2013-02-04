<?php
/**
 * Created by JetBrains PhpStorm.
 * User: admin
 * Date: 29.11.12
 * Time: 14:59
 * To change this template use File | Settings | File Templates.
 */

class Knihovna_Vypujcky_Block_Adminhtml_Vypujcky_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function _construct()
    {
        $this->_objectId   = 'id';
        $this->_controller = 'adminhtml_vypujcky';
        $this->_blockGroup = 'vypujcky';
        parent::_construct();
    }

    public function getHeaderText()
    {
        return 'Přidat výpůjčku';
    }
}