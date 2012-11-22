<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tichave4
 * Date: 1.11.12
 * Time: 14:54
 * To change this template use File | Settings | File Templates.
 */
class Knihovna_VeronikaTest_Model_Resource_VeronikaTest extends Mage_Core_Model_Resource_Db_Abstract
{
    public function _construct(){
                $this->_init('knihovna_veronikatest/knihovna_veronikatest','entitiy_id');
    }
}
