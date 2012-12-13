<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tichave4
 * Date: 29.11.12
 * Time: 13:29
 * To change this template use File | Settings | File Templates.*/
class Knihovna_Titest_Adminhtml_TitestController extends Mage_Adminhtml_Controller_Action{
    public function indexAction(){
        $this->_initAction()->_addContent($this->getLayout()->createBlock('titest/adminhtml_titest'))->renderLayout();
            }
    protected function _initEdit($idFielName='id'){
        $id=$this->getRequest()->getParams($idFielName);
        $model=Mage::getModel('titest/titest');
        if($id){
            $model->load($id);
        }
        if(!Mage::registry('titest')){
            Mage::register('titest',$model);
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
        $this->_addContent($this->getLayout()->createBlock('titest/adminhtml_titest_edit')->setEditMode((bool)$this->getRequest()->getParam('entity_id')));
        $this->renderLayout();
    }
    public function saveAction(){
        $data=$this->getRequest()->getPost();
        $m=Mage::getModel('titest/titest');
        $m->setData($data);
        $m->save();
        $this->_redirect('*/*/');
    }
}

