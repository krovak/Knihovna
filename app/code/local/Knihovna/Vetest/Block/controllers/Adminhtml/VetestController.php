<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tichave4
 * Date: 20.12.12
 * Time: 13:38
 * To change this template use File | Settings | File Templates.
 */
class Knihovna_Vetest_Adminhtml_VetestController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->_initAction()->_addContent($this->getLayout()->createBlock('vetest/adminhtml_vetest'))->renderLayout();
    }

    protected function _initEdit($idFielName = 'id')
    {
        $id = $this->getRequest()->getParams($idFielName);
        $model = Mage::getModel('vetest/vetest');
        if ($id) {
            $model->load($id);
        }
        if (!Mage::registry('vetest')) {
            Mage::register('vetest', $model);
        }
        return $model;
    }

    public function _initAction()
    {
        $this->loadLayout();
        return $this;
    }

    public function newAction()
    {
        $this->_forward('edit');

    }

    public function editAction()
    {
        $this->loadLayout();
        $zanr=$this->_initEdit('id');
        $this->_addContent($this->getLayout()->createBlock('vetest/adminhtml_vetest_edit')->setEditMode((bool)$this->getRequest()->getParam('entity_id')));
        $this->renderLayout();
    }

    public function saveAction()
    {
        $data = $this->getRequest()->getPost();
        $m = Mage::getModel('vetest/vetest');
        $m->setData($data);
        $m->save();
        $this->_redirect('*/*/');
    }
}
