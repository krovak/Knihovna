<?php
class Knihovna_Ctenar_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {

    }
    public function testAction(){
        $cp = $this->getRequest()->getParam('cp');
        $pw = $this->getRequest()->getParam('pw');
        Mage::getModel('ctenar/ctenar')->validate($cp,$pw);
    }
    public function nastenkaAction(){
        $this->loadLayout();
        $this->getLayout()->getBlock('content')->append($this->getLayout()->createBlock('ctenar/nastenka'));
        $this->renderLayout();
    }
    public function vypujckyAction(){
        $this->loadLayout();
        $this->getLayout()->getBlock('content')->append($this->getLayout()->createBlock('vypujcky/vypujckyCtenar'));
        $this->renderLayout();
    }
    public function profilAction(){
        $this->loadLayout();
        $this->getLayout()->getBlock('content')->append($this->getLayout()->createBlock('ctenar/info'));
        $this->renderLayout();
    }
}