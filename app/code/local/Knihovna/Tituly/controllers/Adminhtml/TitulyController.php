<?php
class Knihovna_Tituly_Adminhtml_TitulyController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->_initAction()->_addContent($this->getLayout()
            ->createBlock('tituly/adminhtml_tituly'))->renderLayout();
    }

    protected function _initEdit($idFieldName = 'id')
    {
        $id    = $this->getRequest()->getParams($idFieldName);
        $model = Mage::getModel('tituly/tituly');
        if ($id) {
            $model->load($id);
        }
        if (!Mage::registry('tituly')) {
            Mage::register('tituly', $model);
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

    public function importFromCsvAction()
    {
        echo 'ahoj';
    }

    public function deleteAction()
    {
        Mage::getModel('tituly/tituly')->load($this->getRequest()->getParam('id'))->delete();
        $this->_redirect('*/*/'); //kam se to má přesměrovat po uložení na indexAction, tj. na grid
    }

    public function editAction()
    {

        $this->loadLayout();
        $autor = $this->_initEdit('id');
        $this->_addContent($this->getLayout()
            ->createBlock('tituly/adminhtml_tituly_edit')
            ->setEditMode((bool)$this->getRequest()
            ->getParam('entity_id')));
        $this->renderLayout();
    }

    public function saveAction()
    {
        $data = $this->getRequest()->getPost();
        $m    = Mage::getModel('tituly/tituly');
        $m->setData($data);
        $m->save();
        $this->_redirect('*/*/'); //kam se to má přesměrovat po uložení na indexAction, tj. na grid
    }

    public function importAction()
    {
        /** @var $m Knihovna_ */
        $m = Mage::getModel('tituly/import');
        $m->getInfo($this->getRequest()->getParam('q'));
    }

    public function exportCsvEnhancedAction()
    {
        $fileName   = 'tituly-' . gmdate('YmdHis') . '.csv';
        $grid       = $this->getLayout()->createBlock('tituly/adminhtml_tituly_grid');
        //var_dump($grid->getCsvFileEnhanced());

        $this->_prepareDownloadResponse($fileName, $grid->getCsvFileEnhanced());
        //die;

    }


}