<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Owner
 * Date: 7.2.13
 * Time: 13:20
 * To change this template use File | Settings | File Templates.
 */
class Knihovna_Ctenar_LoginController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $name  = $this->getRequest()->getParam('name');
        $heslo = $this->getRequest()->getParam('password');

        if ($ctenar = Mage::getModel('ctenar/ctenar')->validate($name, $heslo)) {
            Mage::getSingleton('core/session')->setLoggedUser($ctenar);
            $this->_redirect('*/index/nastenka');
        } else {
            $this->loadLayout();
            $this->getLayout()->getBlock('content')->append($this->getLayout()->createBlock('ctenar/login'));
            $this->renderLayout();
        }
    }

    public function logoutAction()
    {
        Mage::getSingleton('core/session')->unsvaLoggedUser();
        $this->_redirect('*/*/index');
    }

    public function loggedAction()
    {
        $this->loadLayout();
        $this->getLayout()->getBlock('content')->append($this->getLayout()->createBlock('ctenar/nastenka'));
        $this->renderLayout();
        //  Mage::getSingleton('core/session')->getLoggedUser(); ukazka ziskani dat ze Session

    }


}
