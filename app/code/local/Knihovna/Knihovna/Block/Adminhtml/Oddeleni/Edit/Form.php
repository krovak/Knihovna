<?php
/**
 * Created by JetBrains PhpStorm.
 * User: altpetr
 * Date: 29.11.12
 * Time: 15:08
 * To change this template use File | Settings | File Templates.
 */

class Knihovna_Knihovna_Block_Adminhtml_Oddeleni_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    public function _construct()
    {
        parent::_construct();
        $this->setId('editForm');
        $this->setTitle('Přidat záznam');
    }
    public function _prepareForm()
    {
        $oddeleni2 = Mage::registry('oddeleni');
        $form = new Varien_Data_Form(array(
            'id'=>'edit_form',
            'method'=>'post'
        ));
        $f = $form->addFieldset('oddeleni',array(
            'legend'=>'Přidat oddělení',
            'class'=>'fieldset-wide'
        ));
                if ($oddeleni2->getId()) {
                    $f->addField('entity_id', 'hidden', array(
                'name' => 'entity_id'
                ));
        }
        $f->addField('nazev','text',array(
            'name'=>'nazev',
            'label'=>'Název',
            'required' => true
        ));
        $form->setValues($oddeleni2->getData());
        $form->setUseContainer(true);
        $form->setAction($this->getUrl('*/*/save'));
        $this->setForm($form);
        return parent::_prepareForm();
}
}