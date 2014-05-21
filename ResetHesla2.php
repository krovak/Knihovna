<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Petr
 * Date: 21.5.14
 * Time: 21:13
 * To change this template use File | Settings | File Templates.
 */

//vygenerujeme nove nahodne heslo:
//odeslani noveho hesla
$noveHeslo = sha1(time());

$token = $_GET['token'];
$query = "UPDATE ctenar SET heslo=sha1('$noveHeslo') WHERE `token`='$token'";
$writeConnection->query($query);



$sablonaEmailu = Mage::getModel('core/email_template')->loadDefault('custom_email_template1');



$promenneProSablonu = array();
$promenneProSablonu['heslo'] = $noveHeslo;


$sablonaEmailu->setSenderName('Administrace');
$sablonaEmailu->setSenderEmail('mail');

$sablonaEmailu->setTemplateSubject('Vaše heslo bylo vyresetováno');

$sablonaEmailu->send($uzivateluv_email,'John Doe', $promenneProSablonu);


