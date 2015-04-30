<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tichave4
 * Date: 22.11.12
 * Time: 14:35
 */

class Knihovna_Ctenar_Model_Resource_Ctenar extends Mage_Core_Model_Resource_Db_Abstract
{

    /**
     * Resource initialization
     */
    protected function _construct()
    {
        $this->_init('ctenar/knihovna_ctenar', 'entity_id');
    }
}