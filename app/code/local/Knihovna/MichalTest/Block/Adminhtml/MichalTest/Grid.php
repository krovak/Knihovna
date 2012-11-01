<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mimo (Michal Moc)
 * Date: 1.11.12
 * Time: 14:23
 * www: http://www.iguru.eu
 * email: info@iguru.eu
 */
 
class Knihovna_MichalTest_Block_Adminhtml_MichalTest_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function _construct(){
        $this->setId('michaltestGrid');
        $this->setDefaultSort('entity_id');
        $this->setDefaultDir('ASC');
        $this->setEmptyText(Mage::helper('adminhtml')->__('Nebyly nalezeny žádné položky'));
        $this->setSaveParametersInSession(true);
    }

    protected function _prepareCollection(){
        $collection = Mage::getResourceSingleton('knihovna_michaltest/knihovna_michaltest_collection');
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }


}