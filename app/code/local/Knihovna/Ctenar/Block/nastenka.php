<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Owner
 * Date: 21.2.13
 * Time: 10:51
 * To change this template use File | Settings | File Templates.
 */
class Knihovna_Ctenar_Block_Nastenka extends Mage_Core_Block_Template{
    public function __construct(){
        parent::__construct();
        $this->setTemplate('knihovna/ctenar/nastenka.phtml');
    }
}