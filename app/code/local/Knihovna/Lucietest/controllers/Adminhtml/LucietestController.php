<?php
/**
 * Created by JetBrains PhpStorm.
 * User: sobotluc
 * Date: 22.11.12
 * Time: 15:03
 * To change this template use File | Settings | File Templates.
 */

class Knihovna_Lucietest_Adminhtml_LucietestController extends Mage_Adminhtml_Controller_Action {
public function indexAction(){
    $this->_initAction()->_addContent($this->getLayout()->createBlock('lucietest/adminhtml_lucietest'))->renderLayout();
}

protected function _initEdit($idFileName='id'){
    $id=$this->getRequest()->getParams($idFileName);
    $model=Mage::getModel('lucietest/lucietest');
    if($id){
        $model->load($id);


    }
    if(!Mage::registry('lucietest')){
        Mage::register('lucietest',$model);
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
        ->createBlock('lucietest/adminhtml_lucietest_edit')
        ->setEditMode((bool)$this->getRequest()
        ->getParam('entity_id')));
        $this->renderLayout();
    }
    public function saveAction(){
        $data = $this->getRequest()->getPost();
        $m = Mage::getModel ('lucietest/lucietest');
        $m->setData($data);
        $m->save();
        $this->_redirect('*/*/');//kam se to m8 presmerovat po ulozeni na andexAc
    }
}