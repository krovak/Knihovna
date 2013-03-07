<?php
/**
 * @author: Premek Sumpela <supr32@gmail.com>
 */

class Knihovna_Ctenar_Model_Observer{

    public function beforeLoadLayout($observer)
    {
        $user = Mage::getSingleton('core/session')->getLoggedUser();
        if ($user->getId()){
            $loggedIn = true;
        }
        else {
            $loggedIn = false;
        }
        $handle = 'ctenar_logged_' . ($loggedIn ? 'in' : 'out');
        var_dump($user);
        $observer->getEvent()->getLayout()->getUpdate()
            ->addHandle('ctenar_logged_' . ($loggedIn ? 'in' : 'out'));
    }
}
