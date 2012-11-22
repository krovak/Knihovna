<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mimo (Michal Moc)
 * Date: 1.11.12
 * Time: 18:34
 * www: http://www.iguru.eu
 * email: info@iguru.eu
 */
 
class Knihovna_MichalTest_Model_MichalTest extends Mage_Core_Model_Abstract {

    public function _construct(){
        parent::_construct();
        $this->_init('michaltest/michaltest');
    }
}