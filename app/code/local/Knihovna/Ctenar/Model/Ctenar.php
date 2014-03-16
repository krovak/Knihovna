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


        $sablonaEmailu = Mage::getModel('core/email_template')->loadDefault('custom_email_template1');

        $promenneProSablonu = array();
        $promenneProSablonu['heslo'] = $noveHeslo;
        $ctenar->setHeslo(sha1($noveHeslo));
        $ctenar->save();
        //echo $promenneProSablonu['heslo'];
        $sablonaEmailu->setSenderName('Administrace');
        $sablonaEmailu->setSenderEmail('EMAIL@DOMAIN.com');

        $sablonaEmailu->setTemplateSubject('Vaše heslo bylo vyresetováno');

        $sablonaEmailu->send($email,'John Doe', $promenneProSablonu);
    }

    public function poslatEmail($body,$subject)
    {
        $ctenar = Mage::registry('ctenar');
        ob_start();
        echo $ctenar->getEmail();
        $email = ob_get_contents();
        ob_end_clean();


        $mail = Mage::getModel('core/email');
        $mail->setToEmail($email);
        $mail->setBody($body);
        $mail->setSubject($subject);
        $mail->setType('text');// You can use 'html' or 'text'

        try {
            $mail->send();

        }
        catch (Exception $e) {
            Mage::getSingleton('core/session')->addError('Unable to send.');

        }
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