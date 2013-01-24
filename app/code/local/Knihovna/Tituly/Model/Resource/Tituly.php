<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mimo (Michal Moc)
 * Date: 15.11.12
 * Time: 13:28
 * www: http://www.iguru.eu
 * email: info@iguru.eu
 */
 
class Knihovna_Tituly_Model_Resource_Tituly extends Mage_Core_Model_Resource_Db_Abstract {

    /**
     * Resource initialization
     */
    protected function _construct()
    {
        // TODO: Implement _construct() method.
        $this->_init('tituly/knihovna_tituly','entity_id');

    }
}