<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mimo (Michal Moc)
 * Date: 1.11.12
 * Time: 14:12
 * www: http://www.iguru.eu
 * email: info@iguru.eu
 */
 
class Knihovna_MichalTest_Model_Resource_MichalTest_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    public function _construct(){
        $this->_init('michaltest/michaltest');
    }
}