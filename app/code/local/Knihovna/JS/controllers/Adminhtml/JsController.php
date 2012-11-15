<?php
/**
 * Created by JetBrains PhpStorm.
 * User: admin
 * Date: 15.11.12
 * Time: 13:50
 * To change this template use File | Settings | File Templates.
 */

class Knihovna_JS_Adminhtml_JsController extends Mage_Adminhtml_Controller_Action {
    public function indexAction() {
        $this->_initAction()->_addContent($this->getLayout()->createBlock('js/adminhtml_js'))->renderLayout();
    }
    public function _initAction() {
        $this->loadLayout();
        return $this;
    }
}