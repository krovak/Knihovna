<?php

class Knihovna_VitaTest_Model_Resource_VitaTest extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function _construct(){
        $this->_init('knihovna_vitavest/knihovna_vitatest','entitiy_id');
    }
}