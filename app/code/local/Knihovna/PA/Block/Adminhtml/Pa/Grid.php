<?php
class Knihovna_PA_Block_Adminhtml_Pa_Grid extends  Mage_Adminhtml_Block_Widget_Grid {
    public function _construct(){
        parent::_construct();
               $this->setId('pa');
                $this->setDefaultSort('entity_id');
                $this->setDefaultDir('asc');
                $this->setEmptyText('Žádná data');
                $this->setSaveParametersInSession(true);
    }

    public function _prepareCollection(){
                $collection = Mage::getModel('pa/pa')->getCollection();
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
