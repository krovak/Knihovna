<?php
/**
 * Created by JetBrains PhpStorm.
 * User: admin
 * Date: 15.11.12
 * Time: 13:35
 * To change this template use File | Settings | File Templates.
 */
class Knihovna_JS_Model_Js extends Mage_Core_Model_Abstract {
    public function _construct() {
        parent::_construct();
        $this->_init('js/js');
    }
}