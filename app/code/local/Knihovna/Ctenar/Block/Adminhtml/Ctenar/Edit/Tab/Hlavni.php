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
        $f->addField(
            'text_emailu', 'text', array(
                'name'     => 'text_emailu',
                'label'    => 'Text E-mailu',
                'required' => false
            )
        );
        $f->addField('submit', 'submit', array(
            'label'     => 'submit',
            'required'  => true,
            'value'  => 'Poslat',
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





//$ctenar->resetHesla();






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