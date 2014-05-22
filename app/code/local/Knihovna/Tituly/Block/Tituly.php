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



        if (!strcmp($podle,'autor'))
        {
            //$operator = 'like';

        $resource = Mage::getSingleton('core/resource');
        $readConnection = $resource->getConnection('core_read');
        $writeConnection = $resource->getConnection('core_write');
        $hledanyString = '%'.$param.'%';


        $query = "SELECT entity_id FROM knihovna_autor WHERE CONCAT(jmeno, ' ', prijmeni) LIKE '$hledanyString'";
        /**
         * Execute the query and store the results in $results
         */
        $cislaCtenaru = array();
        $results = $readConnection->fetchAll($query);
        /*for ($i = 0; $i < count($results); $i++) {
            $cislaCtenaru[$i] =
        }*/
        //echo count($results);
                                                //echo $results[1]["entity_id"];
        //echo '<pre>'; print_r($results); echo '</pre>';
        $autori = array(
            array(
                "finset" => array($results[0]["entity_id"])
            ),

        );

        for ($i = 1; $i < count($results); $i++) {
        $novyAutor = array(
            "finset" => array($results[$i]["entity_id"])
        );
        $autori[] = $novyAutor;
        }
        //echo '<pre>'; print_r($autori); echo '</pre>';

        $books = Mage::getModel('tituly/tituly')->getCollection()
        ->addFieldToFilter($podle, $autori);
            /*foreach ($books as $item){
                $pole = $item->getData();
                //echo $pole['autor'];


            }
*/

        return $books;
        }
        else {

            if (!strcmp($podle,'odroku'))
            {
                $operator = 'gteq';
                $podle = 'rok_vydani';
                $books = Mage::getModel('tituly/tituly')->getCollection()
                    ->addFieldToFilter($podle, array($operator=>$param));
                return $books;
            }
            elseif (!strcmp($podle,'doroku'))
            {
                $operator = 'lteq';
                $podle = 'rok_vydani';
                $books = Mage::getModel('tituly/tituly')->getCollection()
                    ->addFieldToFilter($podle, array($operator=>$param));
                return $books;
            }
            elseif (!strcmp($podle,'nazev'))
            {
                $operator = 'like';
                $books = Mage::getModel('tituly/tituly')->getCollection()
                    ->addFieldToFilter($podle, array($operator=>'%'.$param.'%'));
                return $books;
            }

        }

    }
}