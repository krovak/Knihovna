<?php
/**
 * @author: Premek Sumpela <supr32@gmail.com>
 */

class Knihovna_Ctenar_Model_Observer{

    public function beforeLoadLayout($observer)
    {
        $user = Mage::getSingleton('core/session')->getLoggedUser();
        if (is_object($user)){
            $loggedIn = false;
        }
        else {
            $loggedIn = true;
        }
        $handle = 'ctenar_logged_' . ($loggedIn ? 'in' : 'out');
        $observer->getEvent()->getLayout()->getUpdate()
            ->addHandle($handle);
    }
}
