<?php
/**
 * Created by JetBrains PhpStorm.
 * User: altpetr
 * Date: 22.11.12
 * Time: 15:02
 * To change this template use File | Settings | File Templates.
 */

class Knihovna_Oddeleni_Adminhtml_OddeleniController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->_initAction()->_addContent($this->getLayout()->createBlock('oddeleni/adminhtml_oddeleni'))->renderLayout();
    }

    protected function _initEdit($idFieldName = 'id')
    {
        $id    = $this->getRequest()->getParams($idFieldName);
        $model = Mage::getModel('oddeleni/oddeleni');
        if ($id) {
            $model->load($id);
        }
        if (!Mage::registry('oddeleni')) {
            Mage::register('oddeleni', $model);
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
        $oddeleni2=$this->_initEdit('id');
        $this->_addContent($this->getLayout()
            ->createBlock('oddeleni/adminhtml_oddeleni_edit')
            ->setEditMode((bool)$this->getRequest()
            ->getParam('entity_id')));
        $this->renderLayout();
    }


    public function saveAction()
    {
        $data = $this->getRequest()->getPost();
        $m = Mage::getModel('oddeleni/oddeleni');
        $m->setData($data);
        $m->save();
        $this->_redirect('*/*/');
    }
}