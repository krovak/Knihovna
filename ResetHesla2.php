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


foreach ($collection as $item){
    $pole = $item->getData();

    if ($pole['token'] == $token) {
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

        $sablonaEmailu->send($pole['email'],'John Doe', $promenneProSablonu);

    }




}
echo '<script type="text/javascript" charset="utf-8">
alert("Vaše heslo bylo vyresetováno a na e-mail Vám bylo zasláno heslo nové. Nyní budete přesměrování" +
 "na hlavní stránku knihovny.");
</script>';
    ?>