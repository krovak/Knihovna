<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tichave4
 * Date: 20.12.12
 * Time: 13:38
 * To change this template use File | Settings | File Templates.
 */
class Knihovna_Tituly_Adminhtml_ImportController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->_initAction()->_addContent($this->getLayout()->createBlock('tituly/adminhtml_import_edit'))->renderLayout();
    }


    protected function _initEdit($idFielName = 'entity_id')
    {
        $id    = $this->getRequest()->getParams($idFielName);
        $model = Mage::getModel('tituly/zanr');
        if ($id) {
            $model->load($id);
        }
        if (!Mage::registry('zanr')) {
            Mage::register('zanr', $model);
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
        $zanr = $this->_initEdit('id');
        $this->_addContent($this->getLayout()->createBlock('tituly/adminhtml_import_edit')->setEditMode((bool)$this->getRequest()->getParam('entity_id')));
        $this->renderLayout();
    }

    public function saveAction()
    {
        $data = $this->getRequest()->getPost();
        $m    = Mage::getModel('tituly/zanr');
        $m->setData($data);
        $m->save();
        $this->_redirect('*/*/');

        ///////

        /* NACTENI .CSV */

        if(isset($_FILES['fileinputname']['name']) and (file_exists($_FILES['fileinputname']['tmp_name']))) {
            try {
                $uploader = new Varien_File_Uploader('fileinputname');
                $uploader->setAllowedExtensions(array('csv','txt')); // or pdf or anything


                $uploader->setAllowRenameFiles(false);

                // setAllowRenameFiles(true) -> move your file in a folder the magento way
                // setAllowRenameFiles(true) -> move your file directly in the $path folder
                $uploader->setFilesDispersion(false);

                $path = Mage::getBaseDir('var') . DS ;

                $uploader->save($path, $_FILES['fileinputname']['name']);

                $data['fileinputname'] = $_FILES['fileinputname']['name'];
            }catch(Exception $e) {

            }
        }

        $csv = new Varien_File_Csv();
        //$data = $csv->getData('importCSV.csv');
        $data = $csv -> getData($path.$data['fileinputname']);
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
            $zanrID = $DBdata->getIDbyZanr($zanr);
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
            catch (Exception $e) { echo $e->getMessage() . "\n";
            }
        }


    }
}
