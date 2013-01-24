<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tichave4
 * Date: 29.11.12
 * Time: 13:29
 */
class Knihovna_Ctenar_Adminhtml_CtenarController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->_initAction()->_addContent($this->getLayout()->createBlock('ctenar/adminhtml_ctenar'))->renderLayout();
    }

    protected function _initEdit($idFielName = 'id')
    {
        $id    = $this->getRequest()->getParams($idFielName);
        $model = Mage::getModel('ctenar/ctenar');
        if ($id) {
            $model->load($id);
        }
        if (!Mage::registry('ctenar')) {
            Mage::register('ctenar', $model);
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
        $ctenar = $this->_initEdit('id');
        $this->_addContent($this->getLayout()->createBlock('ctenar/adminhtml_ctenar_edit')->setEditMode((bool)$this->getRequest()->getParam('entity_id')));
        $this->renderLayout();
    }

    public function saveAction()
    {
        $data        = $this->getRequest()->getPost();
        $m           = Mage::getModel('ctenar/ctenar');
        $data['psc'] = str_replace(' ', '', $data['psc']);
        $m->setData($data);
        $m->save();
        $this->_redirect('*/*/');
    }
}

