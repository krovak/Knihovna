<?php
/**
 * Created by JetBrains PhpStorm.
 * User: admin
 * Date: 29.11.12
 * Time: 15:08
 * To change this template use File | Settings | File Templates.
 */

class Knihovna_Vypujcky_Block_Adminhtml_Vypujcky_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{

    public function _construct()
    {
        parent::_construct();
        $this->setId('editForm');
        $this->setTitle('Přidat výpůjčku');
    }

    public function _prepareForm()
    {
        $autor = Mage::registry('Vypujcky');


        $form = new Varien_Data_Form(array(
            'id'     => 'edit_form',
            'method' => 'post'
        ));

        $f = $form->addFieldset('Vypujcky', array(
            'legend' => 'Přidat výpůjčku',
            'class'  => 'fieldset-small'
        ));
        if ($autor->getId()) {
            $f->addField('entity_id', 'hidden', array(
                'name' => 'entity_id'
            ));
        }
        $f->addField('reader', 'select', array(
                'name'     => 'reader',
                'label'    => 'Čtenář',
                'required' => true,
                'values'   => Mage::getModel('ctenar/source_ctenari')->toOptionArray()
            )
        );
        $f->addField('from', 'date', array(
            'name'               => 'from',
            'label'              => 'Datum od',
            'after_element_html' => '<small></small>',
            'tabindex'           => 1,
            'image'              => $this->getSkinUrl('images/grid-cal.gif'),
            'format'             => Mage::app()->getLocale()->getDateFormat(Mage_Core_Model_Locale::FORMAT_TYPE_SHORT),
            'class'              => 'validate-date',
            'required'           => true

        ));
        $f->addField('to', 'date', array(
            'name'               => 'to',
            'label'              => 'Datum do',
            'after_element_html' => '<small></small>',
            'tabindex'           => 1,
            'image'              => $this->getSkinUrl('images/grid-cal.gif'),
            'format'             => Mage::app()->getLocale()->getDateFormat(Mage_Core_Model_Locale::FORMAT_TYPE_SHORT),
           // 'class'              => 'validate-date',
            'required'           => true
        ));

        $f->addField('book', 'select', array(
                'name'     => 'book',
                'label'    => 'Kniha',
                'required' => true,
                'values'   => Mage::getModel('tituly/source_knihy')->toOptionArray()
            )
        );

        $form->setValues($autor->getData());
        $form->setUseContainer(true);
        $form->setAction($this->getUrl('*/*/save'));
        $this->setForm($form);
        return parent::_prepareForm();

    }
}