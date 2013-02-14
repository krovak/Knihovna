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
        $this->setId('page_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(Mage::helper('adminhtml')->__('User Information'));
    }

    protected function _beforeToHtml()
    {
        $this->addTab('main_section', array(
            'label'   => Mage::helper('adminhtml')->__('Hlavní'),
            'title'   => Mage::helper('adminhtml')->__('Hlavní'),
            'content' => $this->getLayout()->createBlock('ctenar/adminhtml_ctenar_edit_tab_hlavni')->toHtml(),
            'active'  => true
        ));

//        $this->addTab('roles_section', array(
//            'label'   => Mage::helper('adminhtml')->__('User Role'),
//            'title'   => Mage::helper('adminhtml')->__('User Role'),
//            'content' => $this->getLayout()->createBlock('adminhtml/api_user_edit_tab_roles', 'user.roles.grid')->toHtml(),
//        ));
        return parent::_beforeToHtml();
    }
}