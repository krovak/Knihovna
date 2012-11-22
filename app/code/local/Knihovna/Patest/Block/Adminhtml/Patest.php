<?php
/**
 * Created by JetBrains PhpStorm.
 * User: altpetr
 * Date: 22.11.12
 * Time: 14:50
 * To change this template use File | Settings | File Templates.
 */

class Knihovna_Patest_Block_Adminhtml_Patest extends Mage_Adminhtml_Block_Widget_Grid_Container {
    public function _construct(){
        $this->_controller='adminhtml_patest';
        $this->_blockGroup='patest';
        parent::_construct();
    }
    public function getHeaderText(){
        return 'NAZDAR';
    }
}