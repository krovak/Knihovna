<?php
/**
 * Created by JetBrains PhpStorm.
 * User: admin
 * Date: 15.11.12
 * Time: 14:02
 * To change this template use File | Settings | File Templates.
 */

class Knihovna_JS_Block_Adminhtml_Js_Grid extends Mage_Adminhtml_Block_Widget_Grid {
    public function _construct() {
        parent::_construct();
        $this->setId('js');
        $this->setDefaultSort('entity_id');
        $this->setDefaultDir('asc');
        $this->setEmptyText('Žádná data');
        $this->setSaveParametersInSession(true);
    }
    public function _prepareCollection() {
        $collection = Mage::getModel('js/js')->getCollection();
        $knihy_tabulka = Mage::getSingleton('core/resource')->getTableName('vj/knihovna_vj');
        $collection->getSelect()->join(array('vj' => $knihy_tabulka), 'vj.entity_id=main_table.book', array('nazev_knihy' => 'nazev'));
        $ctenari_tabulka = Mage::getSingleton('core/resource')->getTableName('titest/knihovna_titest');
        $collection->getSelect()->join(array('vt' => $ctenari_tabulka), 'vt.entity_id=main_table.reader', array('cislo_prukazu' => 'cislo_prukazu'));
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }
    public function _prepareColumns() {
        $this->addColumn('entity_id',array(
            'header'=>'ID',
            'index'=>'entity_id'
        ));
        $this->addColumn('cislo_prukazu',array(
            'header'=>'Čtenář',
            'index'=>'cislo_prukazu'
        ));
        $this->addColumn('from',array(
            'header'=>'Datum od',
            'index'=>'from'
        ));
        $this->addColumn('to',array(
            'header'=>'Datum do',
            'index'=>'to'
        ));
        $this->addColumn('nazev_knihy',array(
            'header'=>'Kniha',
            'index'=>'nazev_knihy'
        ));
        return $this;
    }
    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }
}