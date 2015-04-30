<?php
/**
 * Created by JetBrains PhpStorm.
 * User: sobotluc
 * Date: 22.11.12
 * Time: 14:50
 * To change this template use File | Settings | File Templates.
 */


class Knihovna_Knihovna_Block_Adminhtml_Knihovna extends Mage_Adminhtml_Block_Widget_Grid_Container  {
    public function _construct(){
        $this->_controller='adminhtml_knihovna';
        $this->_blockGroup='knihovna';
        parent::_construct();
    }
    public function getHeaderText(){
        return 'Knihovna';
    }
}
