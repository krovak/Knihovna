<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mimo (Michal Moc)
 * Date: 15.11.12
 * Time: 13:56
 * www: http://www.iguru.eu
 * email: info@iguru.eu
 */
 
class Knihovna_MM_Block_Adminhtml_Mm extends Mage_Adminhtml_Block_Widget_Grid_Container {

    public function _construct(){
        $this->_controller='adminhtml_mm';
        $this->_blockGroup='mm';
        parent::_construct();
    }
    public function getHeaderText(){
        return 'Pokus';
    }
}