<?php
/**
 * Created by JetBrains PhpStorm.
 * User: admin
 * Date: 15.11.12
 * Time: 13:35
 * To change this template use File | Settings | File Templates.
 */
class Knihovna_Vypujcky_Model_Vypujcky extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('vypujcky/vypujcky');
    }
}