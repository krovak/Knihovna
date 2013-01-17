<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mimo (Michal Moc)
 * Date: 22.11.12
 * Time: 14:50
 * www: http://www.iguru.eu
 * email: info@iguru.eu
 */

class Knihovna_Autor_Block_Adminhtml_Autor extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function _construct()
    {
        $this->_controller = 'adminhtml_autor';
        $this->_blockGroup = 'autor';
        parent::_construct();
    }

    public function getHeaderText()
    {
        return 'Seznam autorů';
    }
}