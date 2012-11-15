<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mimo (Michal Moc)
 * Date: 1.11.12
 * Time: 14:23
 * www: http://www.iguru.eu
 * email: info@iguru.eu
 */

class Knihovna_VitaTest_Block_Adminhtml_VitaTest_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function _construct()
    {
        $this->setId('vitatestGrid');
        $this->setDefaultSort('entity_id');
        $this->setDefaultDir('ASC');
        $this->setEmptyText(Mage::helper('adminhtml')->__('Nebyly nalezeny žádné položky'));
        $this->setSaveParametersInSession(true);
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getResourceSingleton('knihovna_vitatest/knihovna_vitatest_collection');
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