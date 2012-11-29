<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tichave4
 * Date: 29.11.12
 * Time: 13:29
 * To change this template use File | Settings | File Templates.*/
class Knihovna_Titest_Adminhtml_TitestController extends Mage_Adminhtml_Controller_Action{
    public function indexAction(){
        $this->_initAction()->_addContent($this->getLayout()->createBlock('titest/adminthtml_titest'))->renderLayout();
            }
    public function _initAction(){
        $this->loadLayout();
        return $this;
    }
}

