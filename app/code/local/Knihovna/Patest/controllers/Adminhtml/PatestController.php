<?php
/**
 * Created by JetBrains PhpStorm.
 * User: altpetr
 * Date: 22.11.12
 * Time: 15:02
 * To change this template use File | Settings | File Templates.
 */

class Knihovna_Patest_Adminhtml_PatestController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->_initAction()->_addContent($this->getLayout()->createBlock('patest/adminhtml_patest'))->renderLayout();
    }

    protected function _initEdit($idFielName = 'id')
    {
        $id    = $this->getRequest()->getParams($idFielName);
        $model = Mage::getModel('patest/patest');
        if ($id) {
            $model->load($id);
        }
        if (!Mage::registry('patest')) {
            Mage::register('patest', $model);
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
        $autor=$this->_initEdit('id');
        $this->_addContent($this->getLayout()
            ->createBlock('patest/adminhtml_patest_edit')
            ->setEditMode((bool)$this->getRequest()
            ->getParam('entity_id')));
        $this->renderLayout();
    }


    public function saveAction()
    {
        $data = $this->getRequest()->getPost();
        $m = Mage::getModel('patest/patest');
        $m->setData($data);
        $m->save();
        $this->_redirect('*/*/');
    }
}