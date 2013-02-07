<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tichave4
 * Date: 22.11.12
 * Time: 14:42
 */
class Knihovna_Ctenar_Model_Ctenar extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('ctenar/ctenar');

    }

    public function getCisloprukazky()
    {
        $prefix = Mage::getStoreConfig('prukazka/cislo/prefix');
        $delka = Mage::getStoreConfig('prukazka/cislo/delka');
        $vypln = Mage::getStoreConfig('prukazka/cislo/vypln');
        /* @var $posledni_cislo Knihovna_Ctenar_Model_Resource_Ctenar_Collection */
        $posledni_cislo = Mage::getModel('ctenar/ctenar')->getCollection()->getLastItem();

        $cp = $prefix . str_pad(($posledni_cislo->getId()) + 1, $delka - strlen($prefix), $vypln, STR_PAD_LEFT);
        return $cp;
    }

    public function validate($cp, $heslo)
    {
        $db = Mage::getModel('ctenar/ctenar')->getCollection()->addFieldToFilter('cislo_prukazu', array('eq' => $cp));
        $data = $db->getData();
        if ($data['entity_id']) {
            return true;
        } else {
            return false;
        }
    }

}