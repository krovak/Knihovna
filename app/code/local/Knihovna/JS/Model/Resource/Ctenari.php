<?php
/**
 * Created by JetBrains PhpStorm.
 * User: admin
 * Date: 17.1.13
 * Time: 11:58
 * To change this template use File | Settings | File Templates.
 */
class Knihovna_JS_Model_Resource_Ctenari extends Mage_Core_Model_Resource_Db_Abstract
{

    /**
     * Resource initialization
     */
    protected function _construct()
    {
        // TODO: Implement _construct() method.
        $this->_init('js/knihovna_ctenari','entity_id');
    }
}