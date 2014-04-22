<?php
/**
 * Created by JetBrains PhpStorm.
 * User: admin
 * Date: 21.2.13
 * Time: 11:54
 * To change this template use File | Settings | File Templates.
 */
class Knihovna_Vypujcky_Block_VypujckyCtenar extends Mage_Core_Block_Template{

    /**
     * @param $id_reader
     * @return Knihovna_Vypujcky_Model_Resource_Vypujcky_Collection
     */
    public function getCtenarVypujcky($id_reader)
    {
        $readers_books = Mage::getModel('vypujcky/vypujcky')->getCollection()
            //->addFieldToFilter('reader', array('eq'=>$id_reader))
            ->addOrder('`to`', Varien_Data_Collection_Db::SORT_ORDER_ASC);
        return $readers_books;
    }

    function object_to_array($object) {
        return (array) $object;
    }

    public function getCtenarVypujcky2()
    {
        $readers_books = Mage::getModel('vypujcky/vypujcky')->getCollection()
            ->addOrder('`to`', Varien_Data_Collection_Db::SORT_ORDER_ASC);
        return $readers_books;
    }

    public function getDaysLeft($date)
    {
        $now = new DateTime(date("y-m-d"));
        $interval = $now->diff($date,false);
        $days_Left = $interval->format('%R%d');
        return $days_Left;
    }
}