<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Owner
 * Date: 21.2.13
 * Time: 11:24
 * To change this template use File | Settings | File Templates.
 */
class Knihovna_Tituly_Block_Tituly extends Mage_Core_Block_Template{
    public function __construct(){
        parent::__construct();

        // $this->setTemplate('knihovna/ctenar/nastenka.phtml');
    }
    public function getKnihy()
    {
        $books = Mage::getModel('tituly/tituly')->getCollection();
        return $books;
    }

    public function getKnihyParam($param)
    {
        $books = Mage::getModel('tituly/tituly')->getCollection()
            ->addFieldToFilter('nazev', array('eq'=>$param));
        return $books;
    }
}