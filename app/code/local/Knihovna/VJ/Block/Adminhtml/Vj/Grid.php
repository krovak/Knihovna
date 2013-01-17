<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mimo (Michal Moc)
 * Date: 15.11.12
 * Time: 14:02
 * www: http://www.iguru.eu
 * email: info@iguru.eu
 */

class Knihovna_VJ_Block_Adminhtml_Vj_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function _construct()
    {
        parent::_construct();
        $this->setId('vj');
        $this->setDefaultSort('entity_id');
        $this->setDefaultDir('asc');
        $this->setEmptyText('Žádná data');
        $this->setSaveParametersInSession(true);
    }

    public function _prepareCollection()
    {
        /* @var $collection Knihovna_VJ_Model_Resource_Vj_Collection */
        $collection = Mage::getModel('vj/vj')->getCollection();
        //$collection->joinTable('autor/knihovna_autor',"entity_id=autor",array('jmeno_autora'=>"CONCAT(jmeno,' ',prijmeni)"));
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
            'index'    => 'autor',
            'renderer' => 'Knihovna_VJ_Block_Adminhtml_Vj_Renderer_Autor'
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
            'renderer' => 'Knihovna_VJ_Block_Adminhtml_Vj_Renderer_Zanr'
        ));
        return $this;
    }

    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }

}
/*id,nazev,isbn,stranky,rok_vydani,zanr*/
