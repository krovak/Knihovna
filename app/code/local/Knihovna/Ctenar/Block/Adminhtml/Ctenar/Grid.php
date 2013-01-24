<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tichave4
 * Date: 22.11.12
 * Time: 14:47
 */
class Knihovna_Ctenar_Block_Adminhtml_Ctenar_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function _construct()
    {
        parent::_construct();
        $this->setId('ctenar');
        $this->setDefaultSort('entity_id');
        $this->setDefaultDir('asc');
        $this->setEmptyText('Žádná data');
        $this->setSaveParametersInSession(true);
    }

    public function _prepareCollection()
    {
        $collection = Mage::getModel('ctenar/ctenar')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    public function _prepareColumns()
    {
        $this->addColumn('entity_id', array(
            'header' => 'ID',
            'index'  => 'entity_id',
            'width'  => '5Opx'
        ));
        $this->addColumn('jmeno', array(
            'header' => 'Jméno',
            'index'  => 'jmeno'
        ));
        $this->addColumn('prijmeni', array(
            'header' => 'Přijmení',
            'index'  => 'prijmeni'
        ));
        $this->addColumn('cislo_prukazu', array(
            'header' => 'Číslo průkazu',
            'index'  => 'cislo_prukazu'
        ));
        $this->addColumn('mesto', array(
            'header' => 'Město',
            'index'  => 'mesto'
        ));
        $this->addColumn('ulice', array(
            'header' => 'Ulice',
            'index'  => 'ulice'
        ));
        $this->addColumn('cp', array(
            'header' => 'Čp',
            'index'  => 'cp',
            'width'  => '70px',
            'align'  => 'right'
        ));
        $this->addColumn('psc', array(
            'header'   => 'PSČ',
            'index'    => 'psc',
            'width'    => '70px',
            'align'    => 'right',
            'renderer' => 'Knihovna_Ctenar_Block_Adminhtml_Ctenar_Renderer_Psc'
        ));


        return $this;
    }

    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }

}
