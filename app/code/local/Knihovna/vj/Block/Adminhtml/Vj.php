<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mimo (Michal Moc)
 * Date: 15.11.12
 * Time: 13:56
 * www: http://www.iguru.eu
 * email: info@iguru.eu
 */
 
class Knihovna_vj_Block_Adminhtml_vj extends Mage_Adminhtml_Block_Widget_Grid_Container {

    public function _construct(){
        $this->_controller='adminhtml_vj';
        $this->_blockGroup='vj';
        parent::_construct();
    }
    public function getHeaderText(){
        return 'Pokus';
    }
}