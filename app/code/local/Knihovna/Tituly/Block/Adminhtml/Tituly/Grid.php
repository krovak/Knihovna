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
        $autori_tabulka = Mage::getSingleton('core/resource')->getTableName('autor/knihovna_autor');
        $collection->getSelect()->join(array('jm' => $autori_tabulka), 'jm.entity_id=main_table.autor', array('autor' => 'jmeno', 'autor'=>'prijmeni'));
        $zanr_tabulka = Mage::getSingleton('core/resource')->getTableName('tituly/zanr');
        $collection->getSelect()->join(array('vt' => $zanr_tabulka), 'vt.entity_id=main_table.zanr', array('zanr' => 'nazev'));
        $collection->getSelect()->columns(new Zend_Db_Expr("Concat(prijmeni,' ',jmeno)as fullname"));
        $this->setCollection($collection);
        return parent::_prepareCollection();
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
        return $this;
    }

    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }

}
/*id,nazev,isbn,stranky,rok_vydani,zanr*/
