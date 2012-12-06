<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tichave4
 * Date: 29.11.12
 * Time: 15:08
 * To change this template use File | Settings | File Templates.
 */
class Knihovna_Titest_Block_Adminhtml_Titest_Edit_Form extends Mage_Adminhtml_Block_Widget_Form{
    public function _construct(){
        parent::_construct();
        $this->setId('titestForm');
        $this->setTitle('Pridat zaznam');
    }
    public function _prepareForm(){
        $form = new Varien_Data_Form(array(
            'id'=>'titesForm',
            'method'=>'Post'
        ));
        $f = $form->addFieldset('mm',array(
            'legend'=>'Pridat autora',
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