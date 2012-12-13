<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mimo (Michal Moc)
 * Date: 29.11.12
 * Time: 14:59
 * www: http://www.iguru.eu
 * email: info@iguru.eu
 */

class Knihovna_Mitest_Block_Adminhtml_Mitest_Edit
    extends Mage_Adminhtml_Block_Widget_Form_Container
{

    public function _construct()
    {
        $this->_objectId   = 'id';
        $this->_controller = 'adminhtml_mitest';
        $this->_blockGroup = 'mitest';
        parent::_construct();

        $this->_addButton('saveandcontinue', array(
            'label'   => Mage::helper('adminhtml')->__('Save and Continue Edit'),
            'onclick' => 'saveAndContinueEdit()',
            'class'   => 'save',
        ), -100);

    }

    public function getHeaderText()
    {
        return 'Přidat záznam';
    }

    /**
     * Check permission for passed action
     *
     * @param string $action
     * @return bool
     */
    protected function _isAllowedAction($action)
    {
        return Mage::getSingleton('admin/session')->isAllowed('mitest/mitest' . $action);
    }

    /**
     * Getter of url for "Save and Continue" button
     * tab_id will be replaced by desired by JS later
     *
     * @return string
     */
    protected function _getSaveAndContinueUrl()
    {
        return $this->getUrl('*/*/save', array(
            '_current'   => true,
            'back'       => 'edit'
        ));
    }


}