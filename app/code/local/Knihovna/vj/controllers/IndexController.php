<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mimo (Michal Moc)
 * Date: 15.11.12
 * Time: 13:46
 * www: http://www.iguru.eu
 * email: info@iguru.eu
 */
 
class Knihovna_vj_IndexController extends Mage_Core_Controller_Front_Action {
    public function indexAction(){
        $collection = Mage::getModel('vj/vj')->getCollection();
        var_dump($collection);
    }
}