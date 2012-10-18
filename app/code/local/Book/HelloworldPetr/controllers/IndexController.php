<?php
class Book_HelloworldPetr_IndexController extends Mage_Core_Controller_Front_Action
{
    public function _construct(){
        parent::_construct();
    }
    public function indexAction()
{
    $this->loadLayout();
    $this->renderLayout();
}
}