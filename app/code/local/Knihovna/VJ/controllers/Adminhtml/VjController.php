<?php
class Knihovna_Mitest_Adminhtml_MitestController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->_initAction()->_addContent($this->getLayout()
            ->createBlock('vj/adminhtml_vj'))->renderLayout();
    }

    protected function _initEdit($idFieldName = 'id')
    {
        $id    = $this->getRequest()->getParams($idFieldName);
        $model = Mage::getModel('vj/vj');
        if ($id) {
            $model->load($id);
        }
        if (!Mage::registry('vj')) {
            Mage::register('vj', $model);
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
            ->createBlock('vj/adminhtml_vj_edit')
            ->setEditMode((bool)$this->getRequest()
            ->getParam('entity_id')));
        $this->renderLayout();
    }

    public function saveAction()
    {
        $data = $this->getRequest()->getPost();
        $m    = Mage::getModel('vj/vj');
        $m->setData($data);
        $m->save();
        $this->_redirect('*/*/'); //kam se to má přesměrovat po uložení na indexAction, tj. na grid
    }

}