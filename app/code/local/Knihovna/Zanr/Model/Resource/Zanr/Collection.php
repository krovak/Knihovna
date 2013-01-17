<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tichave4
 * Date: 22.11.12
 * Time: 14:26
 * To change this template use File | Settings | File Templates.
 */
class Knihovna_Zanr_Model_Resource_Zanr_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    public function _construct()
    {
        $this->_init('zanr/zanr');
    }
}