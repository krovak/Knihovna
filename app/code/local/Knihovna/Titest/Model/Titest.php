<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tichave4
 * Date: 22.11.12
 * Time: 14:42
 * To change this template use File | Settings | File Templates.
 */
class Knihovna_Titest_Model_Titest extends Mage_Core_Model_Abstract{
    public function _construct(){
        parent::_construct();
        $this->_init('titest/titest');
    }
}