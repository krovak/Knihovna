<?php
class Knihovna_PA_IndexController extends Mage_Core_Controller_Front_Action {
    public function indexAction(){
                $collection = Mage::getModel('pa/pa')->getCollection();
                var_dump($collection);
    }
}
