<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mimo (Michal Moc)
 * Date: 15.11.12
 * Time: 14:02
 * www: http://www.iguru.eu
 * email: info@iguru.eu
 */

class Knihovna_Tituly_Block_Adminhtml_Tituly_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function _construct()
    {
        parent::_construct();
        $this->setId('tituly');
        $this->setDefaultSort('entity_id');
        $this->setDefaultDir('asc');
        $this->setEmptyText('Žádná data');
        $this->setSaveParametersInSession(true);
    }

    public function _prepareCollection()
    {

        $collection = Mage::getModel('tituly/tituly')->getCollection();
        $this->setCollection($collection);

        $zmena = parent::_prepareCollection(); //manuální nahrazení jmen autorů - nelze přistoupit pomocí collection SQL (databáze není ani v první normální formě)
        $cteni = Mage::getSingleton('core/resource')->getConnection('core_read');
        $tabulka = Mage::getSingleton('core/resource')->getTableName('tituly/knihovna_tituly');
        $pozadavek = 'SELECT entity_id, autor FROM ' . $tabulka;
        $tituly_autori_tab = $cteni->fetchAll($pozadavek);
        $tabulka = Mage::getSingleton('core/resource')->getTableName('autor/knihovna_autor');
        $pozadavek = 'SELECT * FROM ' . $tabulka;
        $autori_tab = $cteni->fetchAll($pozadavek);
        $kolekce = $zmena->getCollection();
        $kolekce_new = $kolekce;
        $polozky = $kolekce->getItems();
        foreach($polozky as $polozka)
        {
            $id = $polozka->getData()['entity_id'];
            foreach($tituly_autori_tab as $i)
            {
                if($i['entity_id'] == $id)
                {
                    $id_jmen = $i['autor'];
                    break;
                }
            }
            $id_jmen = explode(',', $id_jmen);
            foreach ($id_jmen as $i)
            {
                $i = trim($i);
            }
            $autori = '';
            foreach($id_jmen as $i)
            {
                foreach($autori_tab as $j)
                {
                    if ($j['entity_id'] == $i)
                    {
                        $autori .= $j['jmeno'] . ', ' . $j['prijmeni'] . '; ';
                        break;
                    }
                }
            }
            $autori = substr($autori,0,-2);
            $polozka->setData('fullname',$autori);
            $kolekce_new->removeItemByKey($id);
            $kolekce_new->addItem($polozka);
        }
        $zmena->setCollection($kolekce_new);

        return $zmena;
    }

    public function _prepareColumns()
    {
        $this->addColumn('entity_id', array(
            'header' => 'ID',
            'index'  => 'entity_id',
            'width'  => '30px'
        ));
        $this->addColumn('autor', array(
            'header'   => 'Autor',
            'index'    => 'fullname',
            'filter_index'=>'prijmeni'
        ));
        $this->addColumn('nazev', array(
            'header' => 'Název',
            'index'  => 'nazev'
        ));
        $this->addColumn('isbn', array(
            'header' => 'ISBN',
            'index'  => 'isbn'
        ));
        $this->addColumn('pocet_stranek', array(
            'header' => 'Počet stránek',
            'index'  => 'pocet_stranek'
        ));
        $this->addColumn('rok_vydani', array(
            'header' => 'Rok vydání',
            'index'  => 'rok_vydani'
        ));
        $this->addColumn('zanr', array(
            'header' => 'Žánr',
            'index'  => 'zanr',
            'filter_index'=>'nazev'

        ));

        $this->addExportType('*/*/exportCsvEnhanced', Mage::helper('tituly')->__('CSV'));
        return parent::_prepareColumns();
        return $this;
    }

    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }

    /// novy

    protected $_exportPageSize = 500;
    public function __construct()
    {
        parent::__construct();
    }

    public function importCsvFile() {
        $csv = new Varien_File_Csv();
        $data = $csv->getData('name.csv');
        array_shift($data);

        $target = Mage::getModel('tituly/adminhtml_tituly_grid');
        $target->addData(array('autor' => 'ja', 'isbn' => 'ISBN 80-204-0105-9', 'pocet_stranek' => '90', 'rok_vydani' => 2013,'zanr'=> 2));
        $target->save();

        foreach ($data as $_data) {

        }
    }

    public function getCsvFileEnhanced()
    {
        $this->setCsvFile();
        $this->_isExport = true;
        $this->_prepareGrid();
        $io = new Varien_Io_File();
        $path = Mage::getBaseDir('var') . DS . 'export' . DS; //best would be to add exported path through config
        $name = md5(microtime());
        $file = $path . DS . $name . '.csv';
        /**
         * It is possible that you have name collision (summer/winter time +1/-1)
         * Try to create unique name for exported .csv file
         */
        while (file_exists($file)) {
            sleep(1);
            $name = md5(microtime());
            $file = $path . DS . $name . '.csv';
        }
        $io->setAllowCreateFolders(true);
        $io->open(array('path' => $path));
        $io->streamOpen($file, 'w+');
        $io->streamLock(true);
        $io->streamWriteCsv($this->_getExportHeaders());
        //$this->_exportPageSize = load data from config
        $this->_exportIterateCollectionEnhanced('_exportCsvItem', array($io));
        if ($this->getCountTotals()) {
            $io->streamWriteCsv($this->_getExportTotals());
        }
        $io->streamUnlock();
        $io->streamClose();
        return array(
            'type'  => 'filename',
            'value' => $file,
            'rm'    => false // can delete file after use
        );
    }
    public function _exportIterateCollectionEnhanced($callback, array $args)
    {
        $originalCollection = $this->getCollection();
        $count = null;
        $page  = 1;
        $lPage = null;
        $break = false;
        $ourLastPage = 10;
        while ($break !== true) {
            $collection = clone $originalCollection;
            $collection->setPageSize($this->_exportPageSize);
            $collection->setCurPage($page);
            $collection->load(/*true, true*/);
            if (is_null($count)) {
                $count = $collection->getSize();
                $lPage = $collection->getLastPageNumber();
            }
            if ($lPage == $page || $ourLastPage == $page) {
                $break = true;
            }
            $page ++;
            foreach ($collection as $item) {
                //$item->setState($item->getState(), 'processing'); $item->save();
                call_user_func_array(array($this, $callback), array_merge(array($item), $args));
            }
        }
        /*exit();*/
    }

}
/*id,nazev,isbn,stranky,rok_vydani,zanr*/
