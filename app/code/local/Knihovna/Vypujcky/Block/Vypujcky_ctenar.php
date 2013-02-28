<?php
/**
 * Created by JetBrains PhpStorm.
 * User: admin
 * Date: 21.2.13
 * Time: 11:54
 * To change this template use File | Settings | File Templates.
 */
class Knihovna_Vypujcky_Block_Vypujcky_ctenar extends Mage_Core_Block_Template{

    /**
     * @param $id_reader
     * @return Knihovna_Vypujcky_Model_Resource_Vypujcky_Collection
     */
    public function getCtenarVypujcky($id_reader)
    {
        $readers_books = Mage::getModel('vypujcky/vypujcky')->getCollection()
            ->addAttributeToSelect('book')
            ->addAttributeToSelect('from')
            ->addAttributeToSelect('to')
            ->addAttributeToFilter('reader', $id_reader)
            ->load();
        return $readers_books;
    }
}