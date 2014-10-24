<?php

class Knihovna_Tituly_Model_Tituly extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('tituly/tituly');
    }

    public function getCollection()
    {
        $collection     = parent::getCollection();
        $autori_tabulka = Mage::getSingleton('core/resource')->getTableName('autor/knihovna_autor');
        $collection->getSelect()->join(array('jm' => $autori_tabulka), 'jm.entity_id=main_table.autor', array('autor' => 'jmeno', 'autor' => 'prijmeni'));
        $zanr_tabulka = Mage::getSingleton('core/resource')->getTableName('tituly/knihovna_zanr');
        $collection->getSelect()->join(array('vt' => $zanr_tabulka), 'vt.entity_id=main_table.zanr', array('zanr' => 'nazev'));
        $collection->getSelect()->columns(new Zend_Db_Expr("Concat(prijmeni,' ',jmeno)as fullname"));
        return $collection;
    }

    public function getName($id)
    {
        $nazev = $this->getCollection()->addFieldToFilter('entity_id', array('eq' => $id))->getNazev();
        return $nazev;
    }

    /**
     * @param int $id
     * @param $field rozšíření standartních polí a plné jméno autora
     * @return Mage_Core_Model_Abstract
     */
    public function load($id, $field = null)
    {
        $pl     = parent::load($id, $field);
        $autId  = $pl->getData('autor');
        $autori = Mage::getModel('autor/autor')->load($autId)->getFullName();
        $pl->setData('fullname', $autori);
        return $pl;
    }

    public function save()
    {
        $neco = $this->getData();
        //TODO transformace dat
        $this->setData($neco);
        return parent::save(); // TODO: Change the autogenerated stub
    }


}
