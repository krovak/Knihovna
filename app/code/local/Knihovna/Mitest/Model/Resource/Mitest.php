<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mimo (Michal Moc)
 * Date: 22.11.12
 * Time: 14:35
 * www: http://www.iguru.eu
 * email: info@iguru.eu
 */
 
class Knihovna_Mitest_Model_Resource_Mitest extends Mage_Core_Model_Resource_Db_Abstract {

    /**
     * Resource initialization
     */
    protected function _construct()
    {
        // TODO: Implement _construct() method.
        $this->_init('mitest/knihovna_mitest','entity_id');
    }
}