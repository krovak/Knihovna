<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mimo (Michal Moc)
 * Date: 22.11.12
 * Time: 15:02
 * www: http://www.iguru.eu
 * email: info@iguru.eu
 */

class Knihovna_Autor_Adminhtml_AutorController
    extends Mage_Adminhtml_Controller_Action
{

    public function indexAction()
    {
        $this->_initAction()->_addContent($this->getLayout()
            ->createBlock('autor/adminhtml_autor'))->renderLayout();
    }

    protected function _initEdit($idFieldName = 'id')
    {
        $id    = $this->getRequest()->getParams($idFieldName);
        $model = Mage::getModel('autor/autor');
        if ($id) {
            $model->load($id);
        }
        if (!Mage::registry('autor')) {
            Mage::register('autor', $model);
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
        Mage::getModel('autor/autor')->load($this->getRequest()->getParam('id'))->delete();
        $this->_redirect('*/*/'); //kam se to má přesměrovat po uložení na indexAction, tj. na grid
    }

    public function editAction()
    {

        $this->loadLayout();
        $autor = $this->_initEdit('id');
        $this->_addContent($this->getLayout()
            ->createBlock('autor/adminhtml_autor_edit')
            ->setEditMode((bool)$this->getRequest()
                ->getParam('entity_id')));
        $this->renderLayout();
    }

    public function saveAction()
    {
        $data = $this->getRequest()->getPost();
        $m    = Mage::getModel('autor/autor');
        $m->setData($data);
        $m->save();
        $this->_redirect('*/*/'); //kam se to má přesměrovat po uložení na indexAction, tj. na grid
    }

    public function testAction()
    {
        $m  = Mage::getModel('autor/autor');
        $id = $m->getIdByName("Miroslav", "Virius");
        var_dump($id[0]);
        die;
    }

}