<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tichave4
 * Date: 29.11.12
 * Time: 15:08
 */
class Knihovna_Ctenar_Block_Adminhtml_Ctenar_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    public function _construct()
    {
        parent::_construct();
        $this->setId('editForm');
        $this->setTitle('Přidat záznam');
    }

    public function _prepareForm()
    {
        /** @var $ctenar Knihovna_Ctenar_Model_Ctenar */
        $ctenar = Mage::registry('ctenar');

        if (sizeof($ctenar->getData()) == 0) {
            $ctenar->setData('cislo_prukazu', $ctenar->getCisloprukazky());
        }

        $form = new Varien_Data_Form(array(
            'id'     => 'edit_form',
            'method' => 'Post'
        ));
        $f    = $form->addFieldset('ctenar', array(
            'legend' => 'Přidat čtenáře',
            'class'  => 'fieldset-wide'
        ));
        if ($ctenar->getId()) {
            $f->addField('entity_id', 'hidden', array(
                'name' => 'entity_id'
            ));
        }
        $f->addField('cislo_prukazu', 'text', array(
            'name'     => 'cislo_prukazu',
            'label'    => 'Číslo průkazu',
            'required' => true
        ));
        $f->addField('jmeno', 'text', array(
            'name'     => 'jmeno',
            'label'    => 'Jméno',
            'required' => true
        ));
        $f->addField('prijmeni', 'text', array(
            'name'     => 'prijmeni',
            'label'    => 'Přijmení',
            'required' => true
        ));
        $f->addField('ulice', 'text', array(
            'name'     => 'ulice',
            'label'    => 'Ulice',
            'required' => true
        ));
        $f->addField('cp', 'text', array(
            'name'     => 'cp',
            'label'    => 'Čp',
            'required' => false
        ));
        $f->addField('mesto', 'text', array(
            'name'     => 'mesto',
            'label'    => 'Město',
            'required' => false
        ));
        $f->addField('psc', 'text', array(
            'name'     => 'psc',
            'label'    => 'PSČ',
            'required' => false
        ));
        $f->addField('heslo', 'password', array(
            'name'     => 'heslo',
            'label'    => 'Heslo',
            'required' => true
        ));
        $f->addField('email', 'text', array(
            'name'     => 'email',
            'label'    => 'Email',
            'required' => false
        ));
        $f->addField('telefonni_cislo', 'text', array(
            'name'     => 'telefonni_cislo',
            'label'    => 'Telefonní číslo',
            'required' => false
        ));


        $form->setValues($ctenar->getData());
        $form->setUseContainer(true);
        $form->setAction($this->getUrl('*/*/save'));
        $this->setForm($form);
        return parent::_prepareForm();

    }
}