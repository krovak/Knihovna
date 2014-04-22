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

    public function resetHesla()
    {
        $email = 'alt.p@seznam.cz';

        $adminUser = Mage::getSingleton('admin/session')->getUser();

        ob_start();
        echo $adminUser->getEmail();
        $adminEmail = ob_get_contents();
        ob_end_clean();



        $sablonaEmailu = Mage::getModel('core/email_template')->loadDefault('custom_email_template1');



        $promenneProSablonu = array();
        $promenneProSablonu['heslo'] = Mage::getModel('vypujcky/vypujcky')->getCollection();
        //echo $promenneProSablonu['heslo'];
        $sablonaEmailu->setSenderName('Administrace');
        $sablonaEmailu->setSenderEmail($adminEmail);

        $sablonaEmailu->setTemplateSubject('Vaše heslo bylo vyresetováno');

        $sablonaEmailu->send($email,'John Doe', $promenneProSablonu);

    }

}