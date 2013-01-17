<?php
/**
 * Created by JetBrains PhpStorm.
 * User: admin
 * Date: 15.11.12
 * Time: 13:28
 * To change this template use File | Settings | File Templates.
 */

class Knihovna_JS_Model_Resource_Js extends Mage_Core_Model_Resource_Db_Abstract {
    protected function _construct() {
        $this->_init('js/knihovna_js','entity_id');
    }
}