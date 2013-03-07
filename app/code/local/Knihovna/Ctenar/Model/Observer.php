<?php
/**
 * @author: Premek Sumpela <supr32@gmail.com>
 */

class Knihovna_Ctenar_Model_Observer{

    public function beforeLoadLayout($observer)
    {
        if (Mage::getSingleton('customer/session')->getLoggedUser()){
            $loggedIn = true;
        }
        else {
            $loggedIn = false;
        }
       // $loggedIn = Mage::getSingleton('customer/session')->isLoggedIn();

        $observer->getEvent()->getLayout()->getUpdate()
            ->addHandle('ctenar_logged_' . ($loggedIn ? 'in' : 'out'));
    }
}
