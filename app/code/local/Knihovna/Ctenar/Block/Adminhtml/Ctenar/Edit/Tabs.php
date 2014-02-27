<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mimo (Michal Moc)
 * Date: 7.2.13
 * Time: 13:35
 * www: http://www.iguru.eu
 * email: info@iguru.eu
 */

class Knihovna_Ctenar_Block_Adminhtml_Ctenar_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{


    public function __construct()
    {
        parent::__construct();
        $this->setId('form_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(Mage::helper('adminhtml')->__('Informace o čtenáři'));
    }

    protected function _beforeToHtml()
    {
        $this->addTab('form_hlavni', array(
            'label'   => Mage::helper('adminhtml')->__('Hlavní'),
            'title'   => Mage::helper('adminhtml')->__('Hlavní'),
            'content' => $this->getLayout()->createBlock('ctenar/adminhtml_ctenar_edit_form')->toHtml()
        ));
        $this->addTab('form_nepovinne', array(
            'label'   => Mage::helper('adminhtml')->__('Nepovinné údaje'),
            'title'   => Mage::helper('adminhtml')->__('Nepovinné údaje'),
            'content' => $this->getLayout()->createBlock('ctenar/adminhtml_ctenar_edit_tab_nepovinne')->toHtml()
        ));


        $this->addTab('form_nepovinne', array(
            'label'   => Mage::helper('adminhtml')->__('Nepovinné údaje'),
            'title'   => Mage::helper('adminhtml')->__('Nepovinné údaje'),
            'content' => $this->getLayout()->createBlock('ctenar/adminhtml_ctenar_edit_tab_nepovinne')->toHtml()
        ));
        return parent::_beforeToHtml();
    }
}