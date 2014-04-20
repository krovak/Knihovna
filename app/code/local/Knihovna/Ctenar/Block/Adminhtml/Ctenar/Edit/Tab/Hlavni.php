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


        echo '<script type="text/javascript">
        val2 = localStorage.getItem("val1");



        </script>';

        ob_start(); //Start output buffer
        echo '<script type="text/javascript">
        document.write (val2);

        </script>';
        $promenna = ob_get_contents(); //Grab output
        ob_end_clean();


        if ($promenna = 'test')
            $ctenar->resetHesla();





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
                'onchange' => "alert('on change');"
            )
        );
        $f->addField('submit', 'submit', array(
            'label'     => 'submit',
            'required'  => true,
            'value'  => 'Poslat',
            'onclick' => "
            alert('ahoj');
            val1 = document.getElementById('text_emailu').value;
            localStorage.setItem('val1', val1);
            var val2 = localStorage.getItem('val1');
            alert(val2);
            ",
            'after_element_html' => '<small>Comments</small>',
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