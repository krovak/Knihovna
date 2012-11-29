<?php
/**
 * Created by JetBrains PhpStorm.
 * User: altpetr
 * Date: 22.11.12
 * Time: 15:02
 * To change this template use File | Settings | File Templates.
 */

class Knihovna_Patest_Adminhtml_PatestController extends Mage_Adminhtml_Controller_Action {
    public function indexAction(){
        $this->_initAction()->_addContent($this->getLayout()->createBlock('patest/adminhtml_patest'))->renderLayout();
    }

    public function _initAction(){
        $this->loadLayout();
        return $this;
    }
}