<?php
/**
 * Created by JetBrains PhpStorm.
 * User: sobotluc
 * Date: 22.11.12
 * Time: 15:03
 * To change this template use File | Settings | File Templates.
 */

class Knihovna_Lucietest_Adminhtml_LucietestController extends Mage_Adminhtml_Controller_Action {
public function indexAction(){
    $this->_initAction()->addContent($this->getLayout()->createBlock ('lucietest/adminhtml_lucietest'))->renderLayout();
}
    public function _initAction(){
        $this->loadLayout();
        return $this;
    }
}