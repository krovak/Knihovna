<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Spike
 * Date: 3.1.13
 * Time: 14:25
 * To change this template use File | Settings | File Templates.
 */
class Knihovna_Tituly_Model_Resource_Zanr_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    public function _construct()
    {
        $this->_init('tituly/zanr');
    }
}