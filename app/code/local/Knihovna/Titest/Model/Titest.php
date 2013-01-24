<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tichave4
 * Date: 22.11.12
 * Time: 14:42
 * To change this template use File | Settings | File Templates.
 */
class Knihovna_Titest_Model_Titest extends Mage_Core_Model_Abstract{
    public function _construct(){
        parent::_construct();
        $this->_init('titest/titest');

    }
    public function getCisloprukazky(){
        $prefix = Mage::getStoreConfig('prukazka/cislo/prefix');
        $delka=Mage::getStoreConfig('prukazka/cislo/delka');
        $vypln=Mage::getStoreConfig('prukazka/cislo/vypln');
        $posledni_cislo=Mage::getModel('titest/titest')->getCollection()->getAttributeToSort('entity_id','desc')->limit(1);
        var_dump($posledni_cislo);
        die;
        $cp =  $prefix . str_pad(($posledni_cislo->getId())+1,$delka-strlen($prefix),$vypln,STR_PAD_LEFT);

        return $cp;
    }


}