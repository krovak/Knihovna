<?php
/**
 * Created by JetBrains PhpStorm.
 * User: altpetr
 * Date: 22.11.12
 * Time: 15:01
 * To change this template use File | Settings | File Templates.
 */

class Knihovna_Patest_IndexController extends Mage_Core_Controller_Front_Action {
    public function indexAction(){
        $collection = Mage::getModel('patest/patest')->getCollection();
        var_dump($collection);
    }
}