<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Spike
 * Date: 3.1.13
 * Time: 16:25
 * To change this template use File | Settings | File Templates.
 */
class Knihovna_Autor_Model_Source_Autori
{
    public $autori = array();

    public function __construct()
    {
        //$this->autori[0]['label'] = '-- Vyberte --';
        //$this->autori[0]['value'] = '';
        $autori                   = Mage::getModel('autor/autor')->getCollection();
        /**@var $autor Knihovna_VJ_Model_Autori */
        foreach ($autori as $autor) {
            $id             = $autor->getId();
            $z              = $autor->load($id);
            $jmeno          = $z->getJmeno();
            $prijmeni       = $z->getPrijmeni();
            $this->autori[] = array('value' => $id, 'label' => $prijmeni . ' ' . $jmeno);
        }
    }

    public function toOptionArray()
    {
        return $this->autori;
    }
}
