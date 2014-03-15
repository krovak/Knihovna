<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mimo (Michal Moc)
 * Date: 7.2.13
 * Time: 13:46
 * www: http://www.iguru.eu
 * email: info@iguru.eu
 */

class Knihovna_Ctenar_Block_Adminhtml_Ctenar_Edit_Tab_Heslo
    extends Mage_Adminhtml_Block_Widget_Form
{

    public function _prepareForm()
    {
        $ctenar = Mage::registry('ctenar');
$form = new Varien_Data_Form(array(
'id'     => 'edit_form',
'method' => 'Post'
));
$f    = $form->addFieldset(
'ctenar', array(
'legend' => 'Přidat čtenáře',
'class'  => 'fieldset-wide'
)
);
if (is_object($ctenar)) {
if ($ctenar->getId()) {
$f->addField(
'entity_id', 'hidden', array(
'name' => 'entity_id'
)
);
$ctenar->unsetData("heslo");
}
}

        if (is_object($ctenar))
            $form->setValues($ctenar->getData());
//            $form->setUseContainer(true);

        $form->setAction($this->getUrl('*/*/save'));
        $this->setForm($form);



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
        $sablonaEmailu->setSenderName('NAME');
        $sablonaEmailu->setSenderEmail('EMAIL@DOMAIN.com');
        $sablonaEmailu->setTemplateSubject('STATUS CHANGED');

        $sablonaEmailu->send($email,'John Doe', $promenneProSablonu);

        /*$body = "Hi there, here is some plaintext body content";
        $mail = Mage::getModel('core/email');
        $mail->setToName('John Customer');
        $mail->setToEmail($email);
        $mail->setBody($body);
        $mail->setSubject('The Subject');
        $mail->setFromEmail('yourstore@url.com');
        $mail->setFromName("Your Name");
        $mail->setType('text');// You can use 'html' or 'text'

        try {
            $mail->send();

        }
        catch (Exception $e) {
            Mage::getSingleton('core/session')->addError('Unable to send.');

        }*/

        echo $noveHeslo;

        return parent::_prepareForm();



    }
}



$sablonaEmailu = Mage::getModel('core/email_template')->loadDefault('custom_email_template1');

$promenneProSablonu = array();
$promenneProSablonu['myvar1'] = 'Branko';



