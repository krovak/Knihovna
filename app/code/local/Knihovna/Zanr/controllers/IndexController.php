<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tichave4
 * Date: 20.12.12
 * Time: 14:14
 * To change this template use File | Settings | File Templates.
 */
class Knihovna_Zanr_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $collection = Mage::getModel('zanr/zanr')->getCollection();
        var_dump($collection);
    }
}