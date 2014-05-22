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

    public function importFromCsvAction()
    {
        //$csv = new Varien_File_Csv();
        //$data = $csv->getData('name.csv');
       // array_shift($data);


        $target = Mage::getModel('tituly/tituly');

        /*
        $target->setNazev("kniha");
        $target->setAutor(5);
        $target->setIsbn('ISBN 80-204-0105-8');
        $target->setPocet_stranek('90');
        $target->setRok_vydani('2013');
        $target->setZanr('2');
        */
        try
        {
            $target->save();
            echo "saved ";
        } catch (Exception $e) {
            echo $e->getMessage() . "\n";
        }

        $this->loadLayout();
        $this->_addContent($this->getLayout());

        //foreach ($data as $_data) {

        //}
    }


}