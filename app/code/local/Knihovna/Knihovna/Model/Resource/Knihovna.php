<?php
/**
 * Created by JetBrains PhpStorm.
 * User: sobotluc
 * Date: 22.11.12
 * Time: 14:35
 * To change this template use File | Settings | File Templates.
 */


class Knihovna_Knihovna_Model_Resource_Knihovna extends Mage_Core_Model_Resource_Db_Abstract{
    /**
     * Resource initialization
     */
    protected function _construct()
    {
        // TODO: Implement _construct() method.
        $this->_init('knihovna/knihovna_knihovna','entity_id');
    }
}