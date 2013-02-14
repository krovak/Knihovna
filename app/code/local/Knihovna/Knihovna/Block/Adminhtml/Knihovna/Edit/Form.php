<?php
/**
 * Created by JetBrains PhpStorm.
 * User: sobotluc
 * Date: 29.11.12
 * Time: 15:08
 * To change this template use File | Settings | File Templates.
 */
class Knihovna_Knihovna_Block_Adminhtml_Knihovna_Edit_Form extends Mage_Adminhtml_Block_Widget_Form {

    public function _construct(){
        parent::_construct();
        $this->setId('editForm');
        $this->setTitle('Pridat zaznam');

    }
    public function _prepareForm()
    {
        $knihovna2 = Mage::registry('knihovna');
        $form = new Varien_Data_Form(array(
            'id'=>'edit_form',
            'method'=>'Post'
        ));
        $f = $form->addFieldset('knihovna',array(
            'legend'=>'Přidání knihovny',
            'class'=>'fieldset-wide'
        ));
        if ($knihovna2->getId()) {
            $f->addField('entity_id', 'hidden', array(
                'name' => 'entity_id'
            ));
        }
        $f->addField('nazev','text',array(
            'name'=>'nazev',
            'label'=>'Název',
            'required'=>true
        ));
        $f->addField('adresa', 'text', array(
            'name'     => 'adresa',
            'label'    => 'Adresa',
            'required' => true
        ));
        $form->setValues($knihovna2->getData());
        $form->setUseContainer(true);
        $form->setAction($this->getUrl('*/*/save'));
        $this->setForm($form);
        return parent::_prepareForm();
    }


}