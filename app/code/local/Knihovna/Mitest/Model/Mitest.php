<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mimo (Michal Moc)
 * Date: 22.11.12
 * Time: 14:42
 * www: http://www.iguru.eu
 * email: info@iguru.eu
 */
 
class Knihovna_Mitest_Model_Mitest extends Mage_Core_Model_Abstract {
    public function _construct(){
        parent::_construct();
        $this->_init('mitest/mitest');
    }

}