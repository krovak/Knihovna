<?php
/**
 * Created by JetBrains PhpStorm.
 * User: admin
 * Date: 17.1.13
 * Time: 11:54
 * To change this template use File | Settings | File Templates.
 */
class Knihovna_Ctenar_Model_Source_Ctenari
{
    public $ctenari = array();

    public function __construct()
    {
        $this->ctenari[0]['label'] = '-- Vyberte --';
        $this->ctenari[0]['value'] = '';
        $ctenari                   = Mage::getModel('ctenar/ctenar')->getCollection();
        /**@var $ctenar Knihovna_JS_Model_Ctenari */
        foreach ($ctenari as $ctenar) {
            $entity_id       = $ctenar->getId();
            $z               = $ctenar->load($entity_id);
            $cislo_prukazu   = $z->getCislo_prukazu();
            $this->ctenari[] = array('value' => $entity_id, 'label' => $cislo_prukazu);
        }
    }

    public function toOptionArray()
    {
        return $this->ctenari;
    }
}