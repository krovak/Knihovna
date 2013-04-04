<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mimo (Michal Moc)
 * Date: 22.11.12
 * Time: 14:42
 * www: http://www.iguru.eu
 * email: info@iguru.eu
 */

class Knihovna_Autor_Model_Autor extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('autor/autor');
    }

    public function getIdByName($jmeno, $prijmeni)
    {
        $db = Mage::getModel('autor/autor')
            ->getCollection()
            ->addFieldToSelect()
            ->addFieldToFilter('jmeno', array('eq' => $jmeno))
            ->addFieldToFilter('prijmeni', array('eq' => $prijmeni));
        $data = $db->getData();
        var_dump($data);
        if (@$data['entity_id']) {
            return $data['entity_id'];
        } else {
            return false;
        }
    }

}