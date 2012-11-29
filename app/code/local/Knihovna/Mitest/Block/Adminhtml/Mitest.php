<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mimo (Michal Moc)
 * Date: 22.11.12
 * Time: 14:50
 * www: http://www.iguru.eu
 * email: info@iguru.eu
 */
 
class Knihovna_Mitest_Block_Adminhtml_Mitest extends Mage_Adminhtml_Block_Widget_Grid_Container {
    public function _construct(){
        $this->_controller='adminhtml_mitest';
        $this->_blockGroup='mitest';
        parent::_construct();
    }
    public function getHeaderText(){
        return 'NAZDAR';
    }
}