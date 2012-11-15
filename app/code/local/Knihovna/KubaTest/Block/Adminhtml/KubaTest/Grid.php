<?php

class Knihovna_KubaTest_Block_Adminhtml_KubaTest_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function _construct()
    {
        $this->setId('kubatestGrid');
        $this->setDefaultSort('entity_id');
        $this->setDefaultDir('ASC');
        $this->setEmptyText(Mage::helper('adminhtml')->__('Nebyly nalezeny žádné položky'));
        $this->setSaveParametersInSession(true);
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getResourceSingleton('knihovna_kubatest/knihovna_kubatest_collection');
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn('entity_id', array(
            'header' => $this->__('ID'),
            'width'  => '60px',
            'index'  => 'entity_id'
        ));
        $this->addColumn('jmeno', array(
            'header' => $this->__('Jméno'),
            'align'  => 'left',
            'index'  => 'jmeno'
        ));
        $this->addColumn('prijmeni', array(
            'header' => $this->__('Příjmení'),
            'align'  => 'left',
            'index'  => 'prijmeni'
        ));
        return $this;
    }
}