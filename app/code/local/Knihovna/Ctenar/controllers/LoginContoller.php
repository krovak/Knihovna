<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Owner
 * Date: 7.2.13
 * Time: 13:20
 * To change this template use File | Settings | File Templates.
 */
class Knihovna_Ctenar_LoginContoller extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    $this->loadLayout();
    $this->getLayout()->getBlock('content')->append($this->getLayout()->createBlock('ctenar/login'));
    $this->renderLayout();
    }

}