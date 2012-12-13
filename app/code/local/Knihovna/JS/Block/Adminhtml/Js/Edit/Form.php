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
        $this->setTitle('Přidat záznam');
    }

    public function _prepareForm()
    {
        $autor = Mage::registry('js');

        $form = new Varien_Data_Form(array(
            'id'     => 'edit_form',
            'method' => 'post'
        ));

        $f = $form->addFieldset('js', array(
            'legend' => 'Přidat autora',
            'class'  => 'fieldset-wide'
        ));
        if($autor->getId()){
            $f->addField('entity_id','hidden', array(
                'name'=>'entity_id'
            ));
        }
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
        
        $form->setValues($autor->getData());
        $form->setUseContainer(true);
        $form->setAction($this->getUrl('*/*/save'));
        $this->setForm($form);
        return parent::_prepareForm();
    }
}