<?php

class Knihovna_vj_Adminhtml_vjController extends Mage_Adminhtml_Controller_Action {
    public function indexAction() {
        $this->_initAction()->_addContent($this->getLayout()->createBlock('vj/adminhtml_vj'))->renderLayout();
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
        $this->_addContent($this->getLayout()->createBlock('vj/adminhtml_vj_edit')->setEditMode((bool)$this->getRequest()->getParam('entity_id')));
        $this->renderLayout();
    }
}