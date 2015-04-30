<?php
/**
 * Created by JetBrains PhpStorm.
 * User: admin
 * Date: 15.11.12
 * Time: 13:41
 * To change this template use File | Settings | File Templates.
 */

class Knihovna_Vypujcky_Model_Resource_Vypujcky_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    public function _construct()
    {
        $this->_init('vypujcky/vypujcky');
    }
}