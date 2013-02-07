<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mimo (Michal Moc)
 * Date: 7.2.13
 * Time: 13:46
 * www: http://www.iguru.eu
 * email: info@iguru.eu
 */

class Knihovna_Ctenar_Block_Adminhtml_Ctenar_Edit_Tab_Hlavni
    extends Mage_Adminhtml_Block_Widget_Form
    implements Mage_Adminhtml_Block_Widget_Tab_Interface
{

    public function __construct()
    {
        parent::__construct();
    }

    protected function _prepareLayout()
    {
        parent::_prepareLayout();
//           if (Mage::getSingleton('cms/wysiwyg_config')->isEnabled()) {
//               $this->getLayout()->getBlock('head')->setCanLoadTinyMce(true);
//           }
    }

    public function _prepareForm()
    {
        /** @var $ctenar Knihovna_Ctenar_Model_Ctenar */
        $ctenar = Mage::registry('ctenar');

        if (sizeof($ctenar->getData()) == 0) {
            $ctenar->setData('cislo_prukazu', $ctenar->getCisloprukazky());
        }

        $form = new Varien_Data_Form(array(
            'id'     => 'edit_form',
            'method' => 'Post'
        ));
        $f    = $form->addFieldset('ctenar', array(
            'legend' => 'Přidat čtenáře',
            'class'  => 'fieldset-wide'
        ));
        if ($ctenar->getId()) {
            $f->addField('entity_id', 'hidden', array(
                'name' => 'entity_id'
            ));
            $ctenar->unsetData("heslo");
        }
        $f->addField('cislo_prukazu', 'text', array(
            'name'     => 'cislo_prukazu',
            'label'    => 'Číslo průkazu',
            'required' => true
        ));
        $f->addField('jmeno', 'text', array(
            'name'     => 'jmeno',
            'label'    => 'Jméno',
            'required' => true
        ));


        // Setting custom renderer for content field to remove label column
        $renderer = $this->getLayout()->createBlock('adminhtml/widget_form_renderer_fieldset_element')
            ->setTemplate('cms/page/edit/form/renderer/content.phtml');
        $contentField->setRenderer($renderer);

        $form->setValues($model->getData());
        $this->setForm($form);

        Mage::dispatchEvent('adminhtml_cms_page_edit_tab_content_prepare_form', array('form' => $form));

        return parent::_prepareForm();


        $form->setValues($ctenar->getData());
        $form->setUseContainer(true);
        $form->setAction($this->getUrl('*/*/save'));
        $this->setForm($form);
        return parent::_prepareForm();


//        $form = new Varien_Data_Form();
//
//               $form->setHtmlIdPrefix('page_');
//
//               $model = Mage::registry('cms_page');
//
//               $fieldset = $form->addFieldset('meta_fieldset', array('legend' => Mage::helper('cms')->__('Meta Data'), 'class' => 'fieldset-wide'));
//
//               $fieldset->addField('meta_keywords', 'textarea', array(
//                   'name' => 'meta_keywords',
//                   'label' => Mage::helper('cms')->__('Keywords'),
//                   'title' => Mage::helper('cms')->__('Meta Keywords'),
//                   'disabled'  => $isElementDisabled
//               ));
//
//               $fieldset->addField('meta_description', 'textarea', array(
//                   'name' => 'meta_description',
//                   'label' => Mage::helper('cms')->__('Description'),
//                   'title' => Mage::helper('cms')->__('Meta Description'),
//                   'disabled'  => $isElementDisabled
//               ));
//
//               Mage::dispatchEvent('adminhtml_cms_page_edit_tab_meta_prepare_form', array('form' => $form));
//
//               $form->setValues($model->getData());
//
//               $this->setForm($form);
//
//               return parent::_prepareForm();
//           }

    }


    /**
     * Return Tab label
     *
     * @return string
     */
    public function getTabLabel()
    {
        // TODO: Implement getTabLabel() method.
        return Mage::helper('Ctenar')->__('Content');
    }

    /**
     * Return Tab title
     *
     * @return string
     */
    public function getTabTitle()
    {
        // TODO: Implement getTabTitle() method.
        return Mage::helper('Ctenar')->__('Meta Data');
    }

    /**
     * Can show tab in tabs
     *
     * @return boolean
     */
    public function canShowTab()
    {
        // TODO: Implement canShowTab() method.
        return true;
    }

    /**
     * Tab is hidden
     *
     * @return boolean
     */
    public function isHidden()
    {
        return false;
    }
}