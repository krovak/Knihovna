<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mimo (Michal Moc)
 * Date: 1.11.12
 * Time: 14:09
 * www: http://www.iguru.eu
 * email: info@iguru.eu
 */
 
class Knihovna_MichalTest_Model_Resource_MichalTest extends Mage_Core_Model_Resource_Db_Abstract
{
    public function _construct(){
        $this->_init('knihovna_michaltest/knihovna_michaltest','entitiy_id');
    }
}