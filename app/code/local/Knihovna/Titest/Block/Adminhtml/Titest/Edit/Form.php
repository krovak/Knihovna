<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tichave4
 * Date: 29.11.12
 * Time: 15:08
 * To change this template use File | Settings | File Templates.
 */
class Knihovna_Titest_Block_Adminhtml_Titest_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    public function _construct()
    {
        parent::_construct();
        $this->setId('editForm');
        $this->setTitle('Pridat zaznam');
    }

    public function _prepareForm()
    {
        /** @var $ctenar Knihovna_Titest_Model_Titest */
        $ctenar = Mage::registry('titest');
        //var_dump(Mage::getModel('titest/titest')->getCisloprukazky());die;

        if (sizeof($ctenar->getData()) == 0) {
            $ctenar->setData('cislo_prukazu', $ctenar->getCisloprukazky());
        }

        $form = new Varien_Data_Form(array(
            'id'     => 'edit_form',
            'method' => 'Post'
        ));
        $f    = $form->addFieldset('titest', array(
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
            'required' => true
        ));
        $f->addField('mesto', 'text', array(
            'name'     => 'mesto',
            'label'    => 'Město',
            'required' => true
        ));
        $f->addField('psc', 'text', array(
            'name'     => 'psc',
            'label'    => 'PSČ',
            'required' => true
        ));


        $form->setValues($ctenar->getData());
        $form->setUseContainer(true);
        $form->setAction($this->getUrl('*/*/save'));
        $this->setForm($form);
        return parent::_prepareForm();

    }
}