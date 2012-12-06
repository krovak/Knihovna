<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mimo (Michal Moc)
 * Date: 22.11.12
 * Time: 14:47
 * www: http://www.iguru.eu
 * email: info@iguru.eu
 */
 
class Knihovna_Mitest_Block_Adminhtml_Mitest_Grid
    extends Mage_Adminhtml_Block_Widget_Grid {

    public function _construct(){
            parent::_construct();
            $this->setId('mitest');
            $this->setDefaultSort('entity_id');
            $this->setDefaultDir('asc');
            $this->setEmptyText('Žádná data');
            $this->setSaveParametersInSession(true);
        }

    public function _prepareCollection(){
            $collection = Mage::getModel('mitest/mitest')->getCollection();
            $this->setCollection($collection);
            return parent::_prepareCollection();
        }

    public function _prepareColumns(){
           $this->addColumn('entity_id',array(
               'header'=>'ID',
               'index'=>'entity_id',
               'width'=>'30px'
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