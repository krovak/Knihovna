<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mimo (Michal Moc)
 * Date: 7.2.13
 * Time: 13:46
 * www: http://www.iguru.eu
 * email: info@iguru.eu
 */



class Knihovna_Ctenar_Block_Adminhtml_Ctenar_Edit_Tab_Hlavni
    extends Mage_Adminhtml_Block_Widget_Form
{
    public function _prepareForm()
    {

        /** @var $ctenar Knihovna_Ctenar_Model_Ctenar */
        $ctenar = Mage::registry('ctenar');
        if (!is_object($ctenar)) {
            $ctenar = Mage::getModel('ctenar/ctenar');
            $ctenar->setData('cislo_prukazu', $ctenar->getCisloprukazky());

        }


        //$ctenar->kontrolaVypujcek();
        //$ctenar->pridaniTokenu();





        if (isset($_COOKIE["textEmailu"]))
        $promenna = $_COOKIE["textEmailu"];
        if (isset($promenna) and strlen($promenna) > 0)
        $ctenar->poslatEmail($promenna,'Knihovna');
        setcookie("textEmailu");


        if (isset($_COOKIE["resetHesla"]))
            $promenna = $_COOKIE["resetHesla"];
        if (isset($promenna) and strlen($promenna) > 0)
            $ctenar->resetHesla();
        setcookie("resetHesla");





        $form = new Varien_Data_Form(array(
            'id'     => 'edit_form',
            'method' => 'Post',
            'name'   => 'formular'
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
        $f->addField(
            'text_emailu', 'text', array(
                'name'     => 'text_emailu',
                'id'       => 'text_emailu',
                'label'    => 'Text E-mailu',
                'required' => false,
            )
        );
      /*  $f->addField('submitemail', 'semail', array(
            'label'     => 'Odeslat E-mail',
            'value'  => 'Poslat',
            'required'  => false,
            'onclick' => "

            val1 = document.getElementById('text_emailu').value;
            document.cookie = 'textEmailu'+'='+val1;
            var link = document.createElement('a');
            link.href = document.URL;
            document.body.appendChild(link);
            link.click();
            ",
            'after_element_html' => '<small>E-mail odešlete stisknutím tlačítka Odeslat E-mail.</small>',
            'tabindex' => 1


        ));
        */$f->addField('reset_hesla', 'submit', array(
            'label'     => 'Vyresetovat heslo',
            'value'  => 'Poslat',
            'required'  => false,
            'onclick' => "

            var val5 = 'ano';
            document.cookie = 'resetHesla'+'='+val5;
            var link = document.createElement('a');
            link.href = document.URL;
            document.body.appendChild(link);
            link.click();
            ",
            'after_element_html' => '<small>Heslo vyresetujete stishnutím tlačítka Vyresetovat heslo.</small>',
            'tabindex' => 1


        ));
        $f->addField(
            'cislo_prukazu', 'text', array(
                'name'     => 'cislo_prukazu',
                'label'    => 'Číslo průkazu',
                'required' => true
            )
        );
        $f->addField(
            'jmeno', 'text', array(
                'name'     => 'jmeno',
                'label'    => 'Jméno',
                'required' => true
            )
        );
        $f->addField(
            'prijmeni', 'text', array(
                'name'     => 'prijmeni',
                'label'    => 'Přijmení',
                'required' => true
            )
        );
        $f->addField(
            'ulice', 'text', array(
                'name'     => 'ulice',
                'label'    => 'Ulice',
                'required' => true
            )
        );
        $f->addField(
            'cp', 'text', array(
                'name'     => 'cp',
                'label'    => 'Čp',
                'required' => true
            )
        );
        /*
        $f->addField(
            'mesto', 'text', array(
                'name'     => 'mesto',
                'label'    => 'Město',
                'required' => false
            )
        );
        $f->addField(
            'psc', 'text', array(
                'name'     => 'psc',
                'label'    => 'PSČ',
                'required' => false
            )
        );
        $f->addField(
            'heslo', 'password', array(
                'name'     => 'heslo',
                'label'    => 'Heslo',
                'required' => false
            )
        );
        $f->addField(
            'potvrzeni_hesla', 'password', array(
                'name'     => 'potvrzeni_hesla',
                'label'    => 'Potvrzení hesla',
                'required' => false
            )
        );
        $f->addField(
            'email', 'text', array(
                'name'     => 'email',
                'label'    => 'Email',
                'required' => false
            )
        );
        $f->addField(
            'telefonni_cislo', 'text', array(
                'name'     => 'telefonni_cislo',
                'label'    => 'Telefonní číslo',
                'required' => false
            )
        );
*/
        if (is_object($ctenar))
            $form->setValues($ctenar->getData());
//            $form->setUseContainer(true);

        $form->setAction($this->getUrl('*/*/save'));
        $this->setForm($form);



        return parent::_prepareForm();

    }


}




//$ctenar = Mage::registry('ctenar');
//$ctenar->resetHesla();



//if( isset($_POST['text_emailu']))
//echo $_POST['text_emailu'];
/*$ctenar = Mage::registry('ctenar');
ob_start();
echo $ctenar->getEmail();
$email = ob_get_contents();
ob_end_clean();

$body = "Hi there, here is some plaintext body content";
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