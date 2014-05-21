<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Petr
 * Date: 21.5.14
 * Time: 21:13
 * To change this template use File | Settings | File Templates.
 */

require_once('./app/Mage.php');
Mage::app();

$resource = Mage::getSingleton('core/resource');
$readConnection = $resource->getConnection('core_read');
$writeConnection = $resource->getConnection('core_write');

$collection = Mage::getModel('ctenar/ctenar')->getCollection()
->addFieldToSelect('email')
->addFieldToSelect('token');

$token = $_GET['token'];
echo $token;
die();

foreach ($collection as $item)
    $pole = $item->getData();
    echo '<pre>'; print_r($pole); echo '</pre>';
    if ($pole['token'] == $token) {
    echo '<pre>'; print_r($pole); echo '</pre>';
    die();
    }
die();
//vygenerujeme nove nahodne heslo:
//odeslani noveho hesla
$noveHeslo = sha1(time());


$query = "UPDATE ctenar SET heslo=sha1('$noveHeslo') WHERE `token`='$token'";
$writeConnection->query($query);



$sablonaEmailu = Mage::getModel('core/email_template')->loadDefault('custom_email_template1');



$promenneProSablonu = array();
$promenneProSablonu['heslo'] = $noveHeslo;


$sablonaEmailu->setSenderName('Administrace');
$sablonaEmailu->setSenderEmail('mail');

$sablonaEmailu->setTemplateSubject('Vaše heslo bylo vyresetováno');

$sablonaEmailu->send($uzivateluv_email,'John Doe', $promenneProSablonu);


