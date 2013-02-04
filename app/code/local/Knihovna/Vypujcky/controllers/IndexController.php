<?php
/**
 * Created by JetBrains PhpStorm.
 * User: admin
 * Date: 15.11.12
 * Time: 13:46
 * To change this template use File | Settings | File Templates.
 */

class Knihovna_Vypujcky_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $collection = Mage::getModel('vypujcky/vypujcky')->getCollection();
        var_dump($collection);
    }
}