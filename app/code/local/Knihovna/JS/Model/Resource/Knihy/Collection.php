<?php
/**
 * Created by JetBrains PhpStorm.
 * User: admin
 * Date: 17.1.13
 * Time: 10:28
 * To change this template use File | Settings | File Templates.
 */
class Knihovna_JS_Model_Resource_Knihy_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    public function _construct(){
        $this->_init('js/knihy');
    }
}