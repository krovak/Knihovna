<?php
/**
 * Created by JetBrains PhpStorm.
 * User: altpetr
 * Date: 22.11.12
 * Time: 14:47
 * To change this template use File | Settings | File Templates.
 */

class Knihovna_Knihovna_Block_Adminhtml_Oddeleni_Grid extends Mage_Adminhtml_Block_Widget_Grid {
    public function _construct(){
            parent::_construct();
            $this->setId('oddeleni');
            $this->setDefaultSort('entity_id');
            $this->setDefaultDir('asc');
            $this->setEmptyText('Žádná data');
            $this->setSaveParametersInSession(true);
    }

    public function _prepareCollection(){
            $collection = Mage::getModel('knihovna/oddeleni')->getCollection();
            $this->setCollection($collection);
            return parent::_prepareCollection();
        }

    public function _prepareColumns(){
            $this->addColumn('entity_id',array(
                'header'=>'ID',
                'index'=>'entity_id',
                'width'=>'30px'
            ));
            $this->addColumn('nazev',array(
                    'header'=>'Název',
                    'index'=>'nazev'
            ));
        return $this;
    }
    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }
}