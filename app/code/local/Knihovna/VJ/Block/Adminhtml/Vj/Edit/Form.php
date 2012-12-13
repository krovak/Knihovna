<?php

class Knihovna_VJ_Block_Adminhtml_Vj_Edit_Form extends Mage_Adminhtml_Block_Widget_Form {

    public function _construct()
    {
        parent::_construct();
        $this->setId('editForm');
        $this->setTitle('Přidat záznam');
    }
    public function _prepareForm()
    {
        $autor = Mage::registry('vj');
        $form = new Varien_Data_Form(array(
            'id'=>'edit_form',
            'method'=>'post'
        ));
        $f = $form->addFieldset('vj',array(
            'legend'=>'Přidat autora',
            'class'=>'fieldset-wide'
        ));
        if ($autor->getId()) {
            $f->addField('entity_id', 'hidden', array(
                'name' => 'entity_id'
            ));
        }

        $f->addField('autor','text',array(
            'name' => 'autor',
            'label' => 'Autor',
            'required' => true
        ));
        $f->addField('nazev','text',array(
            'name' => 'nazev',
            'label' => 'Název',
            'required' => true
        ));
        $f->addField('cast','text',array(
           'name' => 'cast',
            'label' => 'Část',
            'required' => true
        ));
        

        $form->setValues($autor->getData());
        $form->setUseContainer(true);
        $form->setAction($this->getUrl('*/*/save'));
        $this->setForm($form);
        return parent::_prepareForm();
    }
}