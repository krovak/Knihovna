<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mimo (Michal Moc)
 * Date: 15.11.12
 * Time: 14:36
 * www: http://www.iguru.eu
 * email: info@iguru.eu
 */
 
class Knihovna_VJ_Block_Adminhtml_Vj_Edit_Form extends Mage_Adminhtml_Block_Widget_Form {

    public function _construct()
    {
        parent::_construct();
        $this->setId('vjForm');
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
        $f->addField('jmeno','text',array(
            'name'=>'jmeno',
            'label'=>'Jméno',
            'required'=>true
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