<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mimo (Michal Moc)
 * Date: 22.11.12
 * Time: 14:35
 * www: http://www.iguru.eu
 * email: info@iguru.eu
 */

class Knihovna_Autor_Model_Resource_Autor extends Mage_Core_Model_Resource_Db_Abstract
{

    /**
     * Resource initialization
     */
    protected function _construct()
    {
        // TODO: Implement _construct() method.
        $this->_init('autor/knihovna_autor', 'entity_id');
    }
    public function getIdByName($jmeno, $prijmeni)
    {
        $db = Mage::getModel('autor/knihovna_autor')
            ->getCollection()
            ->addFieldToFilter('jmeno', array('eq' => $jmeno))
            ->addFieldToFilter('prijmeni', array('eq' => $prijmeni));
        $data = $db->getData();

        if (@$data['entity_id']) {
            return $data['entity_id'];
        } else {
            return false;
        }
    }



}