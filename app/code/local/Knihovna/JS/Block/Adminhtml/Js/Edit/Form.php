<?php
/**
 * Created by JetBrains PhpStorm.
 * User: admin
 * Date: 29.11.12
 * Time: 15:08
 * To change this template use File | Settings | File Templates.
 */

class Knihovna_JS_Block_Adminhtml_Js_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{

    public function _construct()
    {
        parent::_construct();
        $this->setId('editForm');
        $this->setTitle('Přidat výpůjčku');
    }

    public function _prepareForm()
    {
        $autor = Mage::registry('js');

        $form = new Varien_Data_Form(array(
            'id'     => 'edit_form',
            'method' => 'post'
        ));

        $f = $form->addFieldset('js', array(
            'legend' => 'Přidat výpůjčku',
            'class'  => 'fieldset-wide'
        ));
        if($autor->getId()){
            $f->addField('id','hidden', array(
                'name'=>'id'
            ));
        }
        $f->addField('from', 'date', array(
            'name'     => 'from',
            'label'    => 'Datum od',
            'format'   => 'DD-MM-YYYY',
            'required' => true
        ));
        $f->addField('to', 'date', array(
            'name'     => 'to',
            'label'    => 'Datum do',
            'format'   => 'DD-MM-YYYY',
            'required' => true
        ));
        $f->addField('book', 'select', array(
            'name'  => 'book',
            'label' => 'Kniha',
            'required' => true,
            'values' => Mage::getModel('vj/vj')->getAttribute('entity_id'),
            'value' => 'Vyberte'
          )
        );

        $form->setValues($autor->getData());
        $form->setUseContainer(true);
        $form->setAction($this->getUrl('*/*/save'));
        $this->setForm($form);
        return parent::_prepareForm();
    }
}