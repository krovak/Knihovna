<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tichave4
 * Date: 1.11.12
 * Time: 14:21
 * To change this template use File | Settings | File Templates.
 */
class Knihovna_VeronikaTest_Block_Adminhtml_VeronikaTest_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function _construct(){
                $this->setId('veronikatestGrid');
                $this->setDefaultSort('entity_id');
                $this->setDefaultDir('ASC');
                $this->setEmptyText(Mage::helper('adminhtml')->__('Nebyly nalezeny žádné položky'));
                $this->setSaveParametersInSession(true);
    }

    protected function _prepareCollection(){
                $collection = Mage::getResourceSingleton('knihovna_veronikatest/knihovna_veronikatest_collection');
                $this->setCollection($collection);
       return parent::_prepareCollection();
    }


}









