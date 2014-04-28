<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tichave4
 * Date: 22.11.12
 * Time: 14:42
 */
class Knihovna_Ctenar_Model_Ctenar extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('ctenar/ctenar');

    }

    public function getCisloprukazky()
    {
        $prefix = Mage::getStoreConfig('prukazka/cislo/prefix');
        $delka  = Mage::getStoreConfig('prukazka/cislo/delka');
        $vypln  = Mage::getStoreConfig('prukazka/cislo/vypln');
        /* @var $posledni_cislo Knihovna_Ctenar_Model_Resource_Ctenar_Collection */
        $posledni_cislo = Mage::getModel('ctenar/ctenar')->getCollection()->getLastItem();

        $cp = $prefix . str_pad(($posledni_cislo->getId()) + 1, $delka - strlen($prefix), $vypln, STR_PAD_LEFT);
        return $cp;
    }

    public function pokus($heslo1,$heslo2) //funkce pro změnu hesla
    {



        $user = Mage::getModel('core/session')->getLoggedUser();
        //echo $user->getHeslo();

        try {
            if ($heslo1 == $heslo2)
            {


                $user->setHeslo(sha1($heslo1));
                $user->save();
                echo "<h1>Heslo bylo úspěšně změněno!</h1>";
            }
            else
            {
                echo "<h1>Hesla se neshodují!</h1>";
            }
        }
        catch(Exception $ex) {
            $result = 'Error : '.$ex->getMessage();
            echo $result;
        }

    }

    public function resetHesla()
    {
        $ctenar = Mage::registry('ctenar');
        $noveHeslo = sha1(time());

        ob_start();
        echo $ctenar->getEmail();
        $email = ob_get_contents();
        ob_end_clean();

        $adminUser = Mage::getSingleton('admin/session')->getUser();

        ob_start();
        echo $adminUser->getEmail();
        $adminEmail = ob_get_contents();
        ob_end_clean();



        $sablonaEmailu = Mage::getModel('core/email_template')->loadDefault('custom_email_template1');



        $promenneProSablonu = array();
        $promenneProSablonu['heslo'] = $noveHeslo;
        $ctenar->setHeslo(sha1($noveHeslo));
        $ctenar->save();
        //echo $promenneProSablonu['heslo'];
        $sablonaEmailu->setSenderName('Administrace');
        $sablonaEmailu->setSenderEmail($adminEmail);

        $sablonaEmailu->setTemplateSubject('Vaše heslo bylo vyresetováno');

        $sablonaEmailu->send($email,'John Doe', $promenneProSablonu);

    }

    public function kontrolaVypujcek()
    {
        $resource = Mage::getSingleton('core/resource');

        /**
         * Retrieve the read connection
         */
        $readConnection = $resource->getConnection('core_read');

        /**
         * Retrieve the write connection
         */
        $writeConnection = $resource->getConnection('core_write');



        $query = "SELECT * FROM vypujcky WHERE `to` = DATE_ADD( CURDATE( ) , INTERVAL 3 DAY)";
        /**
         * Execute the query and store the results in $results
         */
        $results = $readConnection->fetchAll($query);




        //echo '<pre>'; print_r($results); echo '</pre>';

        ob_start();
        var_dump($results);
        $pokus = ob_get_clean();



        //najdeme, kde vsude jsou ctenari

        $needle = "reader";
        $lastPos = 0;
        $positions = array();

        while (($lastPos = strpos($pokus, $needle, $lastPos))!== false) {
            $positions[] = $lastPos;
            $lastPos = $lastPos + strlen($needle);
        }

        //echo count($positions);
        $seznamCtenaru = array();
        if (count($positions)>0 and is_int(count($positions)))
            for ($i = 0; $i<count($positions); $i++)
            {
                $positions[$i] = $positions[$i]+22;     //v $positions[$i] je konkretni pozice, na ktere ve stringu $pokus
                //zacina cislo ctenare
                $konec_pozice = $positions[$i];
                $j = 0;
                while (is_int($pokus[$positions[$i]+$j]))
                    $konec_pozice = $positions[$i]+$j++;
                //V ARRAY seznamCtenaru BUDOU CTENARI, KTERYM BUDEME POSILAT E-MAILY
                $delka_id_ctenare = $konec_pozice - $positions[$i] + 1;
                $docasny_pokus = substr($pokus,$positions[$i],$delka_id_ctenare);
                //v promenne $docasny_pokus je id ctenare jako string
                $seznamCtenaru[$i] = $docasny_pokus;
                $query = "SELECT * FROM ctenar WHERE `entity_id` = '$seznamCtenaru[$i]'";
                $results = $readConnection->fetchAll($query);

                ob_start();
                var_dump($results);
                $nasCtenar = ob_get_clean();
                //echo $nasCtenar;
                $email = array();
                preg_match("/[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})/i", $nasCtenar, $email);


                $sablonaEmailu = Mage::getModel('core/email_template')->loadDefault('upozorneni_na_vypujcky');




                $adminEmail = Mage::getStoreConfig('trans_email/ident_general/email');
                ob_end_clean();
                $sablonaEmailu->setSenderName('Knihovna');
                $sablonaEmailu->setSenderEmail($adminEmail);

                $sablonaEmailu->setTemplateSubject('Upozornění na výpůjčky');

                $sablonaEmailu->send($email[0],'Knihovna');

            }


    }

    public function poslatEmail($body,$subject)
    {
        $ctenar = Mage::registry('ctenar');
        ob_start();
        echo $ctenar->getEmail();
        $email = ob_get_contents();
        ob_end_clean();

        $mail = Mage::getModel('core/email');
        //$mail->setToEmail($email);

        $headers = "Content-Type: text/html; charset=UTF-8";
        mail($email, $subject, $body, $headers);


    }



    public function validate($cp, $heslo)
    {
        $db   = Mage::getModel('ctenar/ctenar')
            ->getCollection()
            ->addFieldToFilter('cislo_prukazu', array('eq' => $cp))
            ->addFieldToFilter('heslo', array('eq' => sha1($heslo)))
            ->getFirstItem();
        $data = $db->getData();

        if (@$data['entity_id']) {
            return $db;
        } else {
            return false;
        }
    }

}