<?php
/**
 * Created by JetBrains PhpStorm.
 * User: sobotluc
 * Date: 22.11.12
 * Time: 14:50
 * To change this template use File | Settings | File Templates.
 */


class Knihovna_Lucietest_Block_Adminhtml_Lucietest extends Mage_Adminhtml_Block_Widget_Grid_Container  {
    public function _construct(){
        $this->_controller='adminhtml_lucietest';
        $this->_blockGroup='lucietest';
        parent::_construct();
    }
    public function getHeaderText(){
        return 'Nazdar';
    }
}
