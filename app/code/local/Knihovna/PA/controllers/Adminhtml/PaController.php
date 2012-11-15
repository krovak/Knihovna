<?php
class Knihovna_PA_Adminhtml_PaController extends Mage_Adminhtml_Controller_Action {
    public function indexAction() {
               $this->_initAction()->_addContent($this->getLayout()->createBlock('pa/adminhtml_pa'))->renderLayout();
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
        $this->_addContent($this->getLayout()->createBlock('pa/adminhtml_pa_edit')->setEditMode((bool)$this->getRequest()->getParam('entity_id')));
        $this->renderLayout();
    }



}
