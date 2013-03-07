<?php
/**
 * @author: Premek Sumpela <supr32@gmail.com>
 */

class Knihovna_Ctenar_Model_Observer{

    public function beforeLoadLayout($observer)
    {
        if (is_object(Mage::getSingleton('core/session')->getLoggedUser())){
            $loggedIn = true;
        }
        else {
            $loggedIn = false;
        }
        var_dump($loggedIn);
        $observer->getEvent()->getLayout()->getUpdate()
            ->addHandle('ctenar_logged_' . ($loggedIn ? 'in' : 'out'));
    }
}
