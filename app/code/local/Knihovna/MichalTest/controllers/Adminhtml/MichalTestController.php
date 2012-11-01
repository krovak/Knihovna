<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mimo (Michal Moc)
 * Date: 1.11.12
 * Time: 14:44
 * www: http://www.iguru.eu
 * email: info@iguru.eu
 */

class Knihovna_MichalTest_Adminhtml_MichalTestController extends Mage_Adminhtml_Controller_Action
{
    public function _initAction()
    {
        $this->loadLayout()
            ->_setActiveMenu('michal/test')
            ->_addBreadcrumb('Michal', 'Michal')
            ->_addBreadcrumb('Test', 'Test');
        return $this;
    }

    public function indexAction()
    {
        $this->_initAction()
            ->_addContent($this->getLayout()->createBlock('knihovna_michalTest/adminhtml_michalTest'))
            ->renderLayout();
    }
}