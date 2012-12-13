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
        $ctenar = Mage::registry('titest');

        $form = new Varien_Data_Form(array(
            'id' => 'edit_form',
            'method' => 'Post'
        ));
        $f = $form->addFieldset('titest', array(
            'legend' => 'Přidat čtenáře',
            'class' => 'fieldset-wide'
        ));
        if ($ctenar->getId()) {
            $f->addField('entity_id', 'hidden', array(
                'name' => 'entity_id'
            ));
        }

        $f->addField('jmeno', 'text', array(
            'name' => 'jmeno',
            'label' => 'Jméno',
            'required' => true
        ));
        $f->addField('prijmeni', 'text', array(
            'name' => 'prijmeni',
            'label' => 'Přijmení',
            'required' => true
        ));
        $form->setUseContainer(true);
        $form->setAction($this->getUrl('*/*/save'));
        $this->setForm($form);
        return parent::_prepareForm();

    }
}