<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mimo (Michal Moc)
 * Date: 15.11.12
 * Time: 13:50
 * www: http://www.iguru.eu
 * email: info@iguru.eu
 */
 
class Knihovna_VJ_Adminhtml_VjController extends Mage_Adminhtml_Controller_Action {
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
        $this->_addContent($this->getLayout()
            ->createBlock('vj/adminhtml_vj_edit')
            ->setEditMode((bool)$this->getRequest()
            ->getParam('entity_id')));
        $this->renderLayout();
    }

    public function saveAction(){
        $data = $this->getRequest()->getPost();
        $m = Mage::getModel('vj/vj');
        $m->setData($data);
        $m->save();
        $this->_redirect('*/*/');//kam se to má přesměrovat po uložení na indexAction, tj. na grid
    }
}