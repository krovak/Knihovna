<?php
/**
 * Created by JetBrains PhpStorm.
 * User: sobotluc
 * Date: 22.11.12
 * Time: 14:47
 * To change this template use File | Settings | File Templates.
 */


class Knihovna_Lucietest_Block_Adminhtml_Lucietest_Grid
    extends Mage_Adminhtml_Block_Widget_Grid {
public function _construct(){
    parent::_construct();
    $this->setId('Lucietest');
    $this->setDefaultSort('entity_id');
    $this->setDefaultDir('asc');
    $this->setEmptyText('Žádná data');
    $this->setSaveParametersInSession(true);
}
    public function _prepareCollection(){
        $collection = Mage::getModel('lucietest/lucietest')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();

    }
        public function _prepareColumns(){
            $this->addColumn('entity_id',array(
                'header'=>'ID',
                'index'=>'entity_id'
            ));

            $this->addColumn('jmeno',array(
                'header'=>'Jmeno',
                'index'=>'jmeno'
            ));
            $this->addColumn('prijmeni',array(
                'header'=>'Prijmeni',
                'index'=>'prijmeni'
            ));
            return $this;
        }

    }

