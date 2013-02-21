<?php
/**
 * Created by JetBrains PhpStorm.
 * User: admin
 * Date: 15.11.12
 * Time: 13:35
 * To change this template use File | Settings | File Templates.
 */
class Knihovna_Vypujcky_Model_Vypujcky extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('vypujcky/vypujcky');
    }

    /**
     * @param $id_reader
     * @return Knihovna_Vypujcky_Model_Resource_Vypujcky_Collection
     */
    public function getCtenarVypujcky($id_reader)
    {
        $readers_books = $this->getCollection()
            ->addAttributeToSelect('book')
            ->addAttributeToSelect('from')
            ->addAttributeToSelect('to')
            ->addAttributeToFilter('reader', $id_reader)
            ->load();
        return $readers_books;
    }
}