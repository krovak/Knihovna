<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mimo (Michal Moc)
 * Date: 15.11.12
 * Time: 13:34
 * www: http://www.iguru.eu
 * email: info@iguru.eu
 */
class Knihovna_MM_Model_Mm extends Mage_Core_Model_Abstract {
    public function _construct(){
      parent::_construct();
         $this->_init('mm/mm');
    }

}
