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
            'legend'=>'Přidat knihu',
            'class'=>'fieldset-wide'
        ));
        if ($autor->getId()) {
            $f->addField('entity_id', 'hidden', array(
                'name' => 'entity_id'
            ));
        }

        $f->addField('nazev','text',array(
            'name' => 'nazev',
            'label' => 'Název',
            'required' => true
        ));
        $f->addField('isbn','text',array(
            'name' => 'isbn',
            'label' => 'ISBN'
        ));
        $f->addField('pocet_stranek','text',array(
           'name' => 'pocet_stranek',
            'label' => 'Počet stránek'
        ));
        $f->addField('rok_vydani','text',array(
            'name' => 'rok_vydani',
            'label' => 'Rok vydání',
            'required' => true
        ));
        $options = array(
            0 => $this->__('Román'),
            1 => $this->__('Cestopis'),
        );
        $f->addField('ids', 'select', array(
                'name'  => 'ids',
                'label' => Mage::helper('adminhtml')->__('Id Numbers'),
                'title' => Mage::helper('adminhtml')->__('Id Numbers'),
                'required' => true,
                'values' => $options,
                'value' => '1',
            )
        );

        $form->setValues($autor->getData());
        $form->setUseContainer(true);
        $form->setAction($this->getUrl('*/*/save'));
        $this->setForm($form);
        return parent::_prepareForm();
    }
}
/*id,nazev,isbn,stranky,rok_vydani,zanr*/