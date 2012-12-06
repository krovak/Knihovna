<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mimo (Michal Moc)
 * Date: 22.11.12
 * Time: 15:02
 * www: http://www.iguru.eu
 * email: info@iguru.eu
 */

class Knihovna_Mitest_Adminhtml_MitestController
    extends Mage_Adminhtml_Controller_Action
{

    public function indexAction()
    {
        $this->_initAction()->_addContent($this->getLayout()
            ->createBlock('mitest/adminhtml_mitest'))->renderLayout();
    }

    protected function _initEdit($idFieldName = 'id')
    {
        $id    = $this->getRequest()->getParams($idFieldName);
        $model = Mage::getModel('mitest/mitest');
        if ($id) {
            $model->load($id);
        }
        if (!Mage::registry('mitest')) {
            Mage::register('mitest', $model);
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
            ->createBlock('mitest/adminhtml_mitest_edit')
            ->setEditMode((bool)$this->getRequest()
            ->getParam('entity_id')));
        $this->renderLayout();
    }

    public function saveAction()
    {
        $data = $this->getRequest()->getPost();
        $m    = Mage::getModel('mitest/mitest');
        $m->setData($data);
        $m->save();
        $this->_redirect('*/*/'); //kam se to má přesměrovat po uložení na indexAction, tj. na grid
    }

}