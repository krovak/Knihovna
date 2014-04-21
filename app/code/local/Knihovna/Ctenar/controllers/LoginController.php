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
            $this->_redirect('*/index/vypujcky');
            echo "<script type='text/javascript'>\n";
            echo "alert('Prihlaseni bylo uspesne.');\n";
            echo "</script>";

        } else {
            $this->loadLayout();
            $this->getLayout()->getBlock('content')->append($this->getLayout()->createBlock('ctenar/login'));
            $this->renderLayout();
            echo "<script type='text/javascript'>\n";
            echo "alert('Congrats');\n";
            echo "</script>";
        }
    }
    public function logoutAction()
    {
        Mage::getSingleton('core/session')->unsLoggedUser();
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
