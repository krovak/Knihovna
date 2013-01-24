-<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Spike
 * Date: 3.1.13
 * Time: 16:36
 * To change this template use File | Settings | File Templates.
 */
class Knihovna_Tituly_Model_Autori  extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
               parent::_construct();
               $this->_init('tituly/autori');
    }

}
