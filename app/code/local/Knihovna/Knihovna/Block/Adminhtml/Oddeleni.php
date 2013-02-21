<?php
/**
 * Created by JetBrains PhpStorm.
 * User: altpetr
 * Date: 22.11.12
 * Time: 14:50
 * To change this template use File | Settings | File Templates.
 */

class Knihovna_Knihovna_Block_Adminhtml_Oddeleni extends Mage_Adminhtml_Block_Widget_Grid_Container {
    public function _construct(){
        $this->_controller='adminhtml_oddeleni';
        $this->_blockGroup='knihovna';
        parent::_construct();
    }
    public function getHeaderText(){
        return 'Oddělení';
    }
}