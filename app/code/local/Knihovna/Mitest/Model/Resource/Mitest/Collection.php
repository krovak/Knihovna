<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mimo (Michal Moc)
 * Date: 22.11.12
 * Time: 14:26
 * www: http://www.iguru.eu
 * email: info@iguru.eu
 */
 
class Knihovna_Mitest_Model_Resource_Mitest_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract {

    public function _construct(){
        $this->_init('mitest/mitest');
    }
}