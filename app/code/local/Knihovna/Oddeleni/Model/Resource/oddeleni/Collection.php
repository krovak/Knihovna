<?php
/**
 * Created by JetBrains PhpStorm.
 * User: altpetr
 * Date: 22.11.12
 * Time: 14:26
 * To change this template use File | Settings | File Templates.
 */

class Knihovna_Oddeleni_Model_Resource_Oddeleni_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract {
    public function _construct(){
        $this->_init('oddeleni/oddeleni');
    }
}