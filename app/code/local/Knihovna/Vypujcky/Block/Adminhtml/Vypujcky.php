<?php
/**
 * Created by JetBrains PhpStorm.
 * User: admin
 * Date: 15.11.12
 * Time: 13:56
 * To change this template use File | Settings | File Templates.
 */

class Knihovna_Vypujcky_Block_Adminhtml_Vypujcky extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function _construct()
    {
        $this->_controller = 'adminhtml_vypujcky';
        $this->_blockGroup = 'vypujcky';
        parent::_construct();
    }

    public function getHeaderText()
    {
        return 'Výpůjčky';
    }
}