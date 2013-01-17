<?php
/**
 * Created by JetBrains PhpStorm.
 * User: admin
 * Date: 17.1.13
 * Time: 11:53
 * To change this template use File | Settings | File Templates.
 */
class Knihovna_JS_Model_Ctenari  extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('js/ctenari');
    }

}