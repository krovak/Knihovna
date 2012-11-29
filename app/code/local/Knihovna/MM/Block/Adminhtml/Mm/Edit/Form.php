<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mimo (Michal Moc)
 * Date: 15.11.12
 * Time: 14:36
 * www: http://www.iguru.eu
 * email: info@iguru.eu
 */
 
class Knihovna_MM_Block_Adminhtml_Mm_Edit_Form extends Mage_Adminhtml_Block_Widget_Form {

    public function _construct(){
        parent::_construct();
        $this->setId('mmForm');
        $this->setTitle('Přidat záznam');
    }
    public function _prepareForm(){
        $form = new Varien_Data_Form(array(
            'id'=>'mmForm',
            'method'=>'Post'
        ));
        $f = $form->addFieldset('mm',array(
            'legend'=>'co tu je napsaný',
            'class'=>'fieldset-wide'
        ));
        $f->addField('jmeno','text',array(
            'name'=>'jmeno',
            'label'=>'Jméno',
            'required'=>true
        ));
        $f->addField('prijmeni','text',array(
                    'name'=>'prijmeni',
                    'label'=>'Příjmení',
                    'required'=>true
                ));
        $form->setUseContainer(true);
        $form->setAction($this->getUrl('*/*/save'));
        $this->setForm($form);
        return parent::_prepareForm();
    }
}