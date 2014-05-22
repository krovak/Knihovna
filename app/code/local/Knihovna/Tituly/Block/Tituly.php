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

        $resource = Mage::getSingleton('core/resource');
        $readConnection = $resource->getConnection('core_read');
        $writeConnection = $resource->getConnection('core_write');
        $hledanyString = '%'.$param.'%';
        $query = "SHOW TABLES";

        $results = $readConnection->fetchAll($query);

        echo '<pre>'; print_r($results); echo '</pre>';

        die();

        $query = "SELECT entity_id FROM autor WHERE CONCAT(jmeno, ' ', prijmeni) LIKE '$hledanyString'";
        /**
         * Execute the query and store the results in $results
         */
        $results = $readConnection->fetchAll($query);

        echo '<pre>'; print_r($results); echo '</pre>';

        $books = Mage::getModel('tituly/tituly')->getCollection();
            foreach ($books as $item){
                $pole = $item->getData();
                //echo $pole['autor'];


            }

        //echo '%'.$param.'%';

        //echo $podle;
        return $books;
    }
}