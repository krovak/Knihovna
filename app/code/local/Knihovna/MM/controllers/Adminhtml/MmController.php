<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mimo (Michal Moc)
 * Date: 15.11.12
 * Time: 13:50
 * www: http://www.iguru.eu
 * email: info@iguru.eu
 */
 
class Knihovna_MM_Adminhtml_MmController extends Mage_Adminhtml_Controller_Action {
    public function indexAction() {
       $this->_initAction()->_addContent($this->getLayout()->createBlock('mm/adminhtml_mm'))->renderLayout();
    }

    public function _initAction(){
        $this->loadLayout();
        return $this;
    }
    public function newAction(){
        $this->_forward('edit');
    }
    public function editAction(){
        $this->loadLayout();
        $this->_addContent($this->getLayout()->createBlock('mm/adminhtml_mm_edit')->setEditMode((bool)$this->getRequest()->getParam('entity_id')));
        $this->renderLayout();
    }
}