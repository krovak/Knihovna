<?php
/**
 * Created by JetBrains PhpStorm.
 * User: admin
 * Date: 15.11.12
 * Time: 13:56
 * To change this template use File | Settings | File Templates.
 */

class Knihovna_JS_Block_Adminhtml_Js extends Mage_Adminhtml_Block_Widget_Grid_Container {
    public function _construct() {
        $this->_controller='adminhtml_js';
        $this->_blockGroup='js';
        $knihy = array();
        $model = Mage::getModel('vj/vj');
        $collection = $model->getCollection();
        foreach($collection as $item){
            $knihy[$item->getData('entity_id')][' idecko '] = $item->getData('entity_id');
            $knihy[$item->getData('entity_id')][' nazev '] = $item->getData('nazev');
        }
        print_r($knihy[' idecko ']);
        parent::_construct();
    }
    public function getHeaderText() {
        return 'Výpůjčky';
    }
}