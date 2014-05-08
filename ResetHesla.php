<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Petr
 * Date: 29.4.14
 * Time: 18:53
 * To change this template use File | Settings | File Templates.
 */


            if (isset($_POST["emailova_adresa"]) and !empty($_POST["emailova_adresa"]))
            {
                echo 'Ahoj...';
                $uzivateluv_email = $_POST["emailova_adresa"];
                $docasny_email = array();
                preg_match("/[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})/i", $uzivateluv_email, $docasny_email);
                $uzivateluv_email = $docasny_email[0];
                if (empty($uzivateluv_email)) {
                    echo 'Nezadali jste e-mailovou adresu!';
                }
                else {
                    $resource = Mage::getSingleton('core/resource');
                    $readConnection = $resource->getConnection('core_read');
                    $writeConnection = $resource->getConnection('core_write');

                    //vygenerujeme nove nahodne heslo:
                    $noveHeslo = sha1(time());



                    $query = "UPDATE ctenar SET heslo=sha1('$noveHeslo') WHERE `email`='$uzivateluv_email'";
                    $writeConnection->query($query);

                    //mail('alt.p@seznam.cz', $pokus, $_POST["emailova_adresa"]);

                    $sablonaEmailu = Mage::getModel('core/email_template')->loadDefault('custom_email_template1');



                    $promenneProSablonu = array();
                    $promenneProSablonu['heslo'] = $noveHeslo;

                    //echo $promenneProSablonu['heslo'];
                    $sablonaEmailu->setSenderName('Administrace');
                    $sablonaEmailu->setSenderEmail('mail');

                    $sablonaEmailu->setTemplateSubject('Vaše heslo bylo vyresetováno');

                    $sablonaEmailu->send($uzivateluv_email,'John Doe', $promenneProSablonu);
                    echo 'Pokud jste zadali platný e-mail, Vaše heslo bylo vyresetováno a e-mailem Vám bylo zasláno nové.';
                }

            }
else {
    echo 'Nezadali jste e-mailovou adresu!';
}

