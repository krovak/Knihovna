<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tichave4
 * Date: 20.12.12
 * Time: 13:52
 * To change this template use File | Settings | File Templates.
 */
class Knihovna_Zanr_Model_Zanr extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('zanr/zanr');
    }

}