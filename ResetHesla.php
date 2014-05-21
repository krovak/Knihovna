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

                $uzivateluv_email = $_POST["emailova_adresa"];
                $docasny_email = array();
                preg_match("/[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})/i", $uzivateluv_email, $docasny_email);

                if (empty($docasny_email[0])) {
                    echo 'Nezadali jste e-mailovou adresu!';
                }
                else {
                    $collection = Mage::getModel('ctenar/ctenar')->getCollection()
                        ->addFieldToSelect('email');

                    foreach ($collection as $item)
                    {
                        $pole = $item->getData();
                        //echo '<pre>'; print_r($pole); echo '</pre>';
                        if ($pole['email'] == $docasny_email[0]) {
                            $uzivateluv_email = $docasny_email[0];
                            $resource = Mage::getSingleton('core/resource');
                            $readConnection = $resource->getConnection('core_read');
                            $writeConnection = $resource->getConnection('core_write');

                            $nahodnaHodnota = sha1(time());
                            $query = "UPDATE ctenar SET token='$nahodnaHodnota' WHERE `email`='$uzivateluv_email'";
                            $writeConnection->query($query);

                            $webAdresa = "http://knihovna.cokoliv.eu/ResetHesla2.php?token=" . $nahodnaHodnota;

                            $emailTemplate = Mage::getModel('core/email_template')->loadDefault('dotaz_na_heslo');

                            $emailTemplateVariables = array();
                            $emailTemplateVariables['adresa'] = $webAdresa;

                            $processedTemplate = $emailTemplate->getProcessedTemplate($emailTemplateVariables);

                            $emailTemplate->setSenderName('Administrace');
                            $emailTemplate->setSenderEmail('mail');

                            $emailTemplate->setTemplateSubject('Vyresetování hesla');


                            $emailTemplate->send($uzivateluv_email,'John Doe', $emailTemplateVariables);


                        }

                    }
                    echo 'Pokud jste zadali platný e-mail, Vaše heslo bylo vyresetováno a e-mailem Vám bylo zasláno nové.';



                }

            }

