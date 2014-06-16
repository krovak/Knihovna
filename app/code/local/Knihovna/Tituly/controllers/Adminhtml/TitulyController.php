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
        /* NACTENI .CSV */

        $csv = new Varien_File_Csv();
        $data = $csv->getData('importCSV.csv');
        array_shift($data); // prevedeni CSV dat do array
        //var_dump($data);

        /* PROCHAZENI .CSV */


        foreach ($data as $radek) {
            //var_dump($radek);

            /* AUTOR - PRIJMENI a JMENO
             - potreba zjistit jestli uz neexistuje v databazi */

            //rozsekat na prijmeni (muze byt pouze jedno) a jmena (jmen muze byt vic)
                $regularExpression = "/(\s)+/"; // rozsekame podle bilych znaku
                $autorArray = preg_split($regularExpression,$radek[0]); // tady je prijmeni + vsechna jmena autora
            //prijmeni autora
                $prijmeni = $autorArray[0];
            //sloucime jmena s mezerami do jednoho
                $jmeno = $autorArray[1];
                for($i = 2; $i < sizeof($autorArray); $i++)
                    $jmeno .= ' '.$autorArray[$i];
            //zdali autor existuje .. vrati ID, jinak vytvori a vrati ID
                $DB_data = Mage::getModel('autor/autor');
                $autorID = $DB_data->getIdByName($jmeno,$prijmeni);

            /* ZANR - TYP ZANRU
             - potreba zjistit zdali uz neexistuje v databazi */

            //vezmeme zanr
                $zanr = $radek[5];
                var_dump($zanr);
            //zdali zanr existuje .. vrati ID, jinak vytvori a vrati ID
                $DBdata = Mage::getModel('tituly/zanr');
                $zanrID = $DB_data->getIDbyZanr($zanr);
                var_dump($zanrID);
                //$zanrID = 2;

            /* OSTATNI */

                $kniha = $radek[1];
                $isbn = $radek[2];
                $pocetStranek = $radek[3];
                $rokVydani = $radek[4];

            /* VLOZENI DO DATABAZE TITULU */

                $target = Mage::getModel('tituly/tituly');
                $target->setNazev($kniha);
                $target->setAutor($autorID);
                $target->setIsbn($isbn);
                $target->setPocet_stranek($pocetStranek);
                $target->setRok_vydani($rokVydani);
                $target->setZanr($zanrID);

                try { $target->save(); } //ulozeni vkladu
                catch (Exception $e) { echo $e->getMessage() . "\n"; }
        }

        ////

        /*
        $this->loadLayout();
        $this->renderLayout();

        echo '<form action="" method="POST" id="inputCSV" name="inputCSV">';
        echo '<input type="file" name="path">';
        echo '</form>';
        echo '<script type="text/javascript">
                var loginForm = new VarienForm("inputCSV");
                </script>';
        */

        //foreach ($data as $_data) {

        //}
    }

}