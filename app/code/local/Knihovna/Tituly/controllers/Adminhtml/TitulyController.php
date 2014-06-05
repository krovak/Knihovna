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
        /* nacteni .CSV */
        $csv = new Varien_File_Csv();
        $data = $csv->getData('importCSV.csv');
        array_shift($data); // prevedeni CSV dat do array
        //var_dump($data);

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
                try {
                    $DB_data->getIdByName($jmeno,$prijmeni));
                }
                catch (Exception $e) {}
            /* ZANR - typ zanru
             - potreba zjistit zdali uz neexistuje v databazi */

            //vezmeme zanr
                $zanr = $radek[5];
                var_dump($zanr);
            //zdali zanr existuje .. vrati ID, jinak vytvori a vrati ID
                $DBdata = Mage::getModel('tituly/zanr');
                var_dump($DB_data->getIdbyZanr($zanr));

            echo '<br>';
        }

        ////$target = Mage::getModel('tituly/tituly');

        /*
        $target->setNazev("kniha");
        $target->setAutor(5);
        $target->setIsbn('ISBN 80-204-0105-8');
        $target->setPocet_stranek('90');
        $target->setRok_vydani('2013');
        $target->setZanr('2');
        */
        /*
        try
        {
            $target->save();
        } catch (Exception $e) {
            echo $e->getMessage() . "\n";
        }*/

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

    public function importCSV() {
        $path = $_POST["path"];

        if (($handle = fopen($path,"r")) !== FALSE) {
            while (($data = fgetcsv($handle,1000,",")) !== FALSE) {
                /* nacteni dat */
                $autor = $data[0];
                $kniha = $data[1];
                $isbn = $data[2];
                $pocetStranek = $data[3];
                $rokVydani = $data[4];
                $zanr = $data[5];

                /* overeni autora */
                $regularExpression = "\S";
                $autorArray = preg_split($regularExpression,$autor);
                for ($i = 0; $i < sizeof($autorArray); )
                //projet v databazi vsechny autory
                $jmeno = "jmeno1 jmeno2 jmeno3";
                $prijmeni = "prijmeni1";


            }
        }
    }



}