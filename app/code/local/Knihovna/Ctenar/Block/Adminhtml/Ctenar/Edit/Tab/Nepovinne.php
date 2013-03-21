<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Veru
 * Date: 21.3.13
 * Time: 13:59
 * To change this template use File | Settings | File Templates.
 */
class Knihovna_Ctenar_Block_Adminhtml_Ctenar_Edit_Tab_Nepovinne extends Mage_Adminhtml_Block_Widget_Form
{
    public function _prepareForm()
    {
        $form = new Varien_Data_Form();
        $this->setForm($form);
        $f    = $form->addFieldset(
            'ctenar-nepovinne', array(
                'legend' => 'Přidání nepovinných údajů',
                'class'  => 'fieldset-wide'
            )
        );
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

    }
}