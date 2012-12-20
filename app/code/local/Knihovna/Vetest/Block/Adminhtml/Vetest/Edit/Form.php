<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tichave4
 * Date: 20.12.12
 * Time: 13:30
 * To change this template use File | Settings | File Templates.
 */
class Knihovna_Vetest_Block_Adminhtml_Vetest_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    public function _construct()
    {
        parent::_construct();
        $this->setId('editForm');
        $this->setTitle('Pridat zaznam');
    }

    public function _prepareForm()
    {
        $zanr = Mage::registry('vetest');

        $form = new Varien_Data_Form(array(
            'id' => 'edit_form',
            'method' => 'Post'
        ));
        $f = $form->addFieldset('vetest', array(
            'legend' => 'Přidat žánr',
            'class' => 'fieldset-wide'
        ));
        if ($zanr->getId()) {
            $f->addField('entity_id', 'hidden', array(
                'name' => 'entity_id'
            ));
        }
        $f->addField('nazev', 'text', array(
            'name' => 'nazev',
            'label' => 'Název',
            'required' => true
        ));



        $form->setValues($zanr->getData());
        $form->setUseContainer(true);
        $form->setAction($this->getUrl('*/*/save'));
        $this->setForm($form);
        return parent::_prepareForm();

    }
}