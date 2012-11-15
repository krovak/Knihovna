<?php
class Knihovna_AltTest_Adminhtml_AltTestController extends Mage_Adminhtml_Controller_Action
{
    public function _initAction()
    {
        $this->loadLayout()
            ->_setActiveMenu('michal/test')
            ->_addBreadcrumb('Petr', 'Petr')
            ->_addBreadcrumb('Test', 'Test');
        return $this;
    }

    public function indexAction()
    {
        $this->_initAction()
            ->_addContent($this->getLayout()->createBlock('knihovna_altTest/adminhtml_altTest'))
            ->renderLayout();
    }
}
