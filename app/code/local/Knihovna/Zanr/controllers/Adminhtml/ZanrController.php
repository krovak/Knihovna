<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tichave4
 * Date: 20.12.12
 * Time: 13:38
 * To change this template use File | Settings | File Templates.
 */
class Knihovna_Zanr_Adminhtml_ZanrController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->_initAction()->_addContent($this->getLayout()->createBlock('zanr/adminhtml_zanr'))->renderLayout();
    }

    protected function _initEdit($idFielName = 'entity_id')
    {
        $id    = $this->getRequest()->getParams($idFielName);
        $model = Mage::getModel('zanr/zanr');
        if ($id) {
            $model->load($id);
        }
        if (!Mage::registry('zanr')) {
            Mage::register('zanr', $model);
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
        $zanr = $this->_initEdit('id');
        $this->_addContent($this->getLayout()->createBlock('zanr/adminhtml_zanr_edit')->setEditMode((bool)$this->getRequest()->getParam('entity_id')));
        $this->renderLayout();
    }

    public function saveAction()
    {
        $data = $this->getRequest()->getPost();
        $m    = Mage::getModel('zanr/zanr');
        $m->setData($data);
        $m->save();
        $this->_redirect('*/*/');
    }
}
