<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mimo (Michal Moc)
 * Date: 15.11.12
 * Time: 13:41
 * www: http://www.iguru.eu
 * email: info@iguru.eu
 */
 
class Knihovna_Tituly_Model_Resource_Tituly_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract {
    public function _construct(){
       $this->_init('tituly/tituly');
    }
}