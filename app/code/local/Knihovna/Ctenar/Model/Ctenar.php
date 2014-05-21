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
            if (($heslo1 == $heslo2) and ctype_alnum($heslo1))
            {


                $user->setHeslo(sha1($heslo1));
                $user->save();
                echo "<h1>Heslo bylo úspěšně změněno!</h1>";
            }
            elseif (!ctype_alnum($heslo1))
            {
                echo "<h1>Chyba: zadané heslo obsahuje nepovolené znaky!</h1>";
            }
            else
            {
                echo "<h1>Chyba: hesla se neshodují!</h1>";
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


    public function pridaniTokenu()
    {

        $resource = Mage::getSingleton('core/resource');
        $writeConnection = $resource->getConnection('core_write');
        $query = "ALTER TABLE ctenar ADD token VARCHAR(40)";
        $writeConnection->query($query);
        echo 'Done!';
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



        $query = "SELECT reader FROM vypujcky WHERE `to` = DATE_ADD( CURDATE( ) , INTERVAL 3 DAY)";
        /**
         * Execute the query and store the results in $results
         */
        $results = $readConnection->fetchAll($query);




        //echo '<pre>'; print_r($results); echo '</pre>';


        $seznamCtenaru = array();
        foreach($results as $existuje)
        {
            if (isset($existuje["reader"]))
            {
                array_push($seznamCtenaru, $existuje["reader"]);

            }

            }
        $seznamCtenaru = array_unique($seznamCtenaru);

        for ($i = 0; $i<count($seznamCtenaru); $i++)

        {



                $cislo = $seznamCtenaru[$i];

                $query = "SELECT email FROM ctenar WHERE `entity_id` = '$cislo'";

                $nasCtenar = $readConnection->fetchOne($query);






                $sablonaEmailu = Mage::getModel('core/email_template')->loadDefault('upozorneni_na_vypujcky');




                $adminEmail = Mage::getStoreConfig('trans_email/ident_general/email');

                $sablonaEmailu->setSenderName('Knihovna');
                $sablonaEmailu->setSenderEmail($adminEmail);

                $sablonaEmailu->setTemplateSubject('Upozornění na výpůjčky');

                $sablonaEmailu->send($nasCtenar,'Knihovna');




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