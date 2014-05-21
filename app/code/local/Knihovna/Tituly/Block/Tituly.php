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

    public function getKnihyParam($param,$podle)
    {

        if (!strcmp($podle,'odroku'))
        {
            //$operator = 'lteq';
            $podle = 'rok_vydani';
        }
        elseif (!strcmp($podle,'doroku'))
        {
            //$operator = 'gteq';
            $podle = 'rok_vydani';
        }
        /*elseif (!strcmp($podle,'autor'))
        {
            $autor[] = array($param);
            $autor[] = array('like' =>$param. ',%');
            $autor[] = array('like' => '%,' . $param);
            $autor[] = array('like' => '%,' . $param . ',%');
        }*/
        else
            $operator = 'like';



        $books = Mage::getModel('tituly/tituly')->getCollection()
            ->addFieldToFilter($podle, array('like' => '%'));
        echo '%'.$param.'%';

        echo $podle;
        return $books;
    }
}