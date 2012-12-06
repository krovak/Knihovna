<?php
/**
 * Created by JetBrains PhpStorm.
 * User: admin
 * Date: 15.11.12
 * Time: 13:50
 * To change this template use File | Settings | File Templates.
 */

class Knihovna_JS_Adminhtml_JsController extends Mage_Adminhtml_Controller_Action {

    public function indexAction(){
        $this->_initAction()->_addContent($this->getLayout()
            ->createBlock('js/adminhtml_js'))->renderLayout();
    }

    protected function _initEdit($idFieldName = 'id'){
        $id = $this->getRequest()->getParams($idFieldName);
        $model = Mage::getModel('js/js');
        if($id){
            $model->load($id);
        }
        if(!Mage::registry('js')){
            Mage::register('js',$model);
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
        $autor = $this->_initEdit('id');
        $this->_addContent($this->getLayout()
            ->createBlock('js/adminhtml_js_edit')
            ->setEditMode((bool)$this->getRequest()
            ->getParam('entity_id')));
        $this->renderLayout();
    }

    public function saveAction(){
        $data = $this->getRequest()->getPost();
        $m = Mage::getModel('js/js');
        $m->setData($data);
        $m->save();
        $this->_redirect('*/*/');//kam se to má přesměrovat po uložení na indexAction, tj. na grid
    }

}