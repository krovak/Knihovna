<?php
/**
 * Created by JetBrains PhpStorm.
 * User: admin
 * Date: 15.11.12
 * Time: 14:02
 * To change this template use File | Settings | File Templates.
 */

class Knihovna_Vypujcky_Block_Adminhtml_Vypujcky_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function _construct()
    {
        parent::_construct();
        $this->setId('vypujcky');
        $this->setDefaultSort('entity_id');
        $this->setDefaultDir('asc');
        $this->setEmptyText('Žádná data');
        $this->setSaveParametersInSession(true);
    }

    public function _prepareCollection()
    {
        $collection    = Mage::getModel('vypujcky/vypujcky')->getCollection();
        $knihy_tabulka = Mage::getSingleton('core/resource')->getTableName('tituly/knihovna_tituly');
        $collection->getSelect()->join(array('tituly' => $knihy_tabulka), 'tituly.entity_id=main_table.book', array('book' => 'nazev'));
        $ctenari_tabulka = Mage::getSingleton('core/resource')->getTableName('ctenar/knihovna_ctenar');
        $collection->getSelect()->join(array('ctenar' => $ctenari_tabulka), 'ctenar.entity_id=main_table.reader', array('reader' => 'cislo_prukazu'));
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    public function _prepareColumns()
    {
        $this->addColumn('entity_id', array(
            'header' => 'ID',
            'index'  => 'entity_id'
        ));
        $this->addColumn('reader', array(
            'header'       => 'Čtenář',
            'index'        => 'reader',
            'filter_index' => 'cislo_prukazu'
        ));
        $this->addColumn('from', array(
            'header' => 'Datum od',
            'index'  => 'from'
        ));
        $this->addColumn('to', array(
            'header' => 'Datum do',
            'index'  => 'to'
        ));
        $this->addColumn('book', array(
            'header'       => 'Kniha',
            'index'        => 'book',
            'filter_index' => 'nazev'
        ));
        return $this;
    }

    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }
}