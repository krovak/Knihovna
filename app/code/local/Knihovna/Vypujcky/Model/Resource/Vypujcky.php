<?php
/**
 * Created by JetBrains PhpStorm.
 * User: admin
 * Date: 15.11.12
 * Time: 13:28
 * To change this template use File | Settings | File Templates.
 */

class Knihovna_Vypujcky_Model_Resource_Vypujcky extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('vypujcky/knihovna_vypujcky', 'entity_id');
    }
}