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

            /* AUTOR - JMENO a PRIJMENI */
            // potreba zjistit jestli uz neexistuje v databazi
            // rozsekat na jmeno (jmen muze byt vic) a prijmeni (prijmeni pouze jedno..a to to posledni)
                $regularExpression = "/\S+/"; // rozsekame podle bilych znaku
                var_dump($radek[0]);
                $autorArray = preg_split($regularExpression,$radek[0]); // tady jsou vsechna jmena + prijmeni autora
                var_dump($autorArray);
            //sloucime jmena s mezerami do jednoho
                $jmeno = '';
                for($i = 0; $i < end($autorArray)-1; $i++)
                    $jmeno .= $autorArray[i];
            // prijmeni autora
                $prijmeni = $autorArray[sizeof($autorArray)-1];

            var_dump($jmeno);
            var_dump($prijmeni);

            $DB_data = Mage::getModel('autor/autor');
            var_dump($DB_data->getIdByName($jmeno,$prijmeni));
        }


        $DB_data = Mage::getModel('autor/autor');
        var_dump($DB_data->getIdByName("Miroslav","Virius"));

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