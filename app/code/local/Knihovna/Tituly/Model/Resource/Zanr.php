<?php
/**
 * User: tichave4
 * Date: 20.12.12
 * Time: 13:51
 */
class Knihovna_Tituly_Model_Resource_Zanr extends Mage_Core_Model_Resource_Db_Abstract
{

    /**
     * Resource initialization
     */
    protected function _construct()
    {
        $this->_init('tituly/knihovna_zanr', 'entity_id');
    }
}