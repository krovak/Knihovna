<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tichave4
 * Date: 22.11.12
 * Time: 14:35
 * To change this template use File | Settings | File Templates.
 */

class Knihovna_Titest_Model_Resource_Titest extends Mage_Core_Model_Resource_Db_Abstract{

    /**
     * Resource initialization
     */
    protected function _construct()
    {
        // TODO: Implement _construct() method.
        $this->_init('titest/knihovna_titest','entity_id');
    }
}