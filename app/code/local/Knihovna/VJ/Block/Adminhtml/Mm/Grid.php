<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mimo (Michal Moc)
 * Date: 15.11.12
 * Time: 14:02
 * www: http://www.iguru.eu
 * email: info@iguru.eu
 */
 
class Knihovna_MM_Block_Adminhtml_Mm_Grid extends  Mage_Adminhtml_Block_Widget_Grid {
    public function _construct(){
        parent::_construct();
        $this->setId('mm');
        $this->setDefaultSort('entity_id');
        $this->setDefaultDir('asc');
        $this->setEmptyText('Žádná data');
        $this->setSaveParametersInSession(true);
    }

    public function _prepareCollection(){
        $collection = Mage::getModel('mm/mm')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    public function _prepareColumns(){
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

}