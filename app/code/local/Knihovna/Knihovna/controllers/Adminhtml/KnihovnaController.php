<?php
/**
 * Created by JetBrains PhpStorm.
 * User: sobotluc
 * Date: 22.11.12
 * Time: 15:03
 * To change this template use File | Settings | File Templates.
 */

class Knihovna_Knihovna_Adminhtml_KnihovnaController extends Mage_Adminhtml_Controller_Action {
public function indexAction(){
    $this->_initAction()->_addContent($this->getLayout()->createBlock('knihovna/adminhtml_knihovna'))->renderLayout();
}

protected function _initEdit($idFileName='id'){
    $id=$this->getRequest()->getParams($idFileName);
    $model=Mage::getModel('knihovna/knihovna');
    if($id){
        $model->load($id);


    }
    if(!Mage::registry('knihovna')){
        Mage::register('knihovna',$model);
    }
    return $model;
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
        ->createBlock('knihovna/adminhtml_knihovna_edit')
        ->setEditMode((bool)$this->getRequest()
        ->getParam('entity_id')));
        $this->renderLayout();
    }
    public function saveAction(){
        $data = $this->getRequest()->getPost();
        $m = Mage::getModel ('knihovna/knihovna');
        $m->setData($data);
        $m->save();
        $this->_redirect('*/*/');//kam se to m8 presmerovat po ulozeni na andexAc
    }
}