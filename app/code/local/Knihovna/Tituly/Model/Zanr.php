<?php

class Knihovna_Tituly_Model_Zanr extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('tituly/zanr');
    }

    public function getIDbyZanr($zanr) {
        $db = Mage::getModel('tituly/zanr')
            ->getCollection()
            ->addFieldToSelect('entity_id')
            ->addFieldToFilter('nazev', array('eq' => $zanr))
            ->getLastItem();

        $data = $db->getData();
        if (@$data['entity_id']) {
            return $data['entity_id'];
        } else {
            $new_zanr = Mage::getModel('tituly/zanr');
            $new_zanr->setData('nazev',$zanr);
            $new_zanr->save();
            getIdByZanr($zanr);
        }
    }

}