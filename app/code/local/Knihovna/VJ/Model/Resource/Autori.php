<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Spike
 * Date: 3.1.13
 * Time: 16:38
 * To change this template use File | Settings | File Templates.
 */
class Knihovna_VJ_Model_Resource_Autori extends Mage_Core_Model_Resource_Db_Abstract
{

    /**
     * Resource initialization
     */
    protected function _construct()
    {
        // TODO: Implement _construct() method.
        $this->_init('vj/knihovna_autori','id');
    }
}