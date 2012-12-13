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
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }
    public function _prepareColumns() {
        $this->addColumn('entity_id',array(
            'header'=>'ID',
            'index'=>'entity_id'
        ));
        $this->addColumn('jmeno',array(
            'header'=>'Jméno',
            'index'=>'jmeno'
        ));
        $this->addColumn('prijmeni',array(
            'header'=>'Přijmení',
            'index'=>'prijmeni'
        ));
        return $this;
    }
    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }
}