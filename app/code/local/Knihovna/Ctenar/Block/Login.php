<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Owner
 * Date: 7.2.13
 * Time: 13:30
 * To change this template use File | Settings | File Templates.
 */
class Knihovna_Ctenar_Block_Login extends Mage_Core_Block_Template
{
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('knihovna/ctenar/login.phtml') ;
        return $this;
    }
}