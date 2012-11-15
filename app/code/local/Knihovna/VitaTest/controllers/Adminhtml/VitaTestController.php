<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mimo (Michal Moc)
 * Date: 1.11.12
 * Time: 14:44
 * www: http://www.iguru.eu
 * email: info@iguru.eu
 */

class Knihovna_VitaTest_Adminhtml_VitaTestController extends Mage_Adminhtml_Controller_Action
{
    public function _initAction()
    {
        $this->loadLayout()
            ->_setActiveMenu('vita/test')
            ->_addBreadcrumb('Vita', 'Vita')
            ->_addBreadcrumb('Test', 'Test');
        return $this;
    }

    public function indexAction()
    {
        $this->_initAction()
            ->_addContent($this->getLayout()->createBlock('knihovna_vitaTest/adminhtml_vitaTest'))
            ->renderLayout();
    }
}