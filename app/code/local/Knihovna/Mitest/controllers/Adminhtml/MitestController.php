<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mimo (Michal Moc)
 * Date: 22.11.12
 * Time: 15:02
 * www: http://www.iguru.eu
 * email: info@iguru.eu
 */
 
class Knihovna_Mitest_Adminhtml_MitestController
    extends Mage_Adminhtml_Controller_Action {

    public function indexAction(){
        $this->_initAction()->_addContent($this->getLayout()
            ->createBlock('mitest/adminhtml_mitest'))->renderLayout();
    }

    public function _initAction(){
        $this->loadLayout();
        return $this;
    }
}