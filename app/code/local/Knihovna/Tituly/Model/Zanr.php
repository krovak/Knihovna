<?php

class Knihovna_Tituly_Model_Zanr extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('tituly/zanr');
    }

    public function getIDbyZanr($zanr) {
        //$db = Mage::getModel('tituly/zanr')
        $db = $this ->getCollection()
          //  ->addFieldToSelect('entity_id')
            ->addFieldToFilter('nazev', array('eq' => $zanr))
            ->getLastItem();

        $data = $db->getData();
        var_dump($data);
        if (@$data['entity_id']) {
            return $data['entity_id'];
        } else {
            //$new_zanr = Mage::getModel('tituly/zanr');
            $this ->setData('nazev',$zanr);
            $this ->save();
            getIdByZanr($zanr);
        }
    }

}