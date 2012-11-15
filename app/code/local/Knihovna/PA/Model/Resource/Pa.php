<?php
class Knihovna_PA_Model_Resource_Pa extends Mage_Core_Model_Resource_Db_Abstract {

    /**
         * Resource initialization
         */
    protected function _construct()
    {
        // TODO: Implement _construct() method.
        $this->_init('pa/knihovna_pa','entity_id');

    }
}
