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
        $collection->getSelect()->join(array('vj' => 'vj_test'), 'vj.entity_id=js_test.book', array('book' => 'nazev'));
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }
    public function _prepareColumns() {
        $this->addColumn('entity_id',array(
            'header'=>'ID',
            'index'=>'entity_id'
        ));
        $this->addColumn('reader',array(
            'header'=>'Čtenář',
            'index'=>'reader'
        ));
        $this->addColumn('from',array(
            'header'=>'Datum od',
            'index'=>'from'
        ));
        $this->addColumn('to',array(
            'header'=>'Datum do',
            'index'=>'to'
        ));
        $this->addColumn('book',array(
            'header'=>'Kniha',
            'index'=>'book'
        ));
        return $this;
    }
    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }
}