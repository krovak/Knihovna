<?php

class Knihovna_vj_Block_Adminhtml_vj_Edit_Form extends Mage_Adminhtml_Block_Widget_Form {

    public function _construct(){
        parent::_construct();
        $this->setId('vjForm');
        $this->setTitle('Přidat záznam');
    }
    public function _prepareForm(){
        $form = new Varien_Data_Form(array(
            'id'=>'vjForm',
            'method'=>'Post'
        ));
        $f = $form->addFieldset('vj',array(
            'legend'=>'co tu je napsaný',
            'class'=>'fieldset-wide'
        ));
        $f->addField('jmeno','text',array(
            'name'=>'jmeno',
            'label'=>'Jméno',
            'required'=>true
        ));
        $form->setUseContainer(true);
        $form->setAction($this->getUrl('*/*/save'));
        $this->setForm($form);
        return parent::_prepareForm();
    }
}