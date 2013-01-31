<?php
/**
 * Created by JetBrains PhpStorm.
 * User: admin
 * Date: 15.11.12
 * Time: 13:50
 * To change this template use File | Settings | File Templates.
 */

class Knihovna_Vypujcky_Adminhtml_VypujckyController extends Mage_Adminhtml_Controller_Action
{

    public function indexAction()
    {
        $this->_initAction()->_addContent($this->getLayout()
            ->createBlock('vypujcky/adminhtml_vypujcky'))->renderLayout();
    }

    protected function _initEdit($idFieldName = 'id')
    {
        $id    = $this->getRequest()->getParams($idFieldName);
        $model = Mage::getModel('vypujcky/vypujcky');
        if ($id) {
            $model->load($id);
        }
        if (!Mage::registry('Vypujcky')) {
            Mage::register('Vypujcky', $model);
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

    public function deleteAction()
    {
        Mage::getModel('vypujcky/vypujcky')->load($this->getRequest()->getParam('id'))->delete();
        $this->_redirect('*/*/'); //kam se to má přesměrovat po uložení na indexAction, tj. na grid
    }

    public function editAction()
    {
        $this->loadLayout();
        $autor = $this->_initEdit('id');
        $this->_addContent($this->getLayout()
            ->createBlock('vypujcky/adminhtml_vypujcky_edit')
            ->setEditMode((bool)$this->getRequest()
            ->getParam('entity_id')));
        $this->renderLayout();
    }

    public function saveAction()
    {
        $data = $this->getRequest()->getPost();
        $m    = Mage::getModel('vypujcky/vypujcky');
        $m->setData($data);
        $m->save();
        $this->_redirect('*/*/'); //kam se to má přesměrovat po uložení na indexAction, tj. na grid
    }

}