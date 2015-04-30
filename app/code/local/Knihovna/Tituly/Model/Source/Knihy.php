<?php
/**
 * Created by JetBrains PhpStorm.
 * User: admin
 * Date: 17.1.13
 * Time: 10:23
 * To change this template use File | Settings | File Templates.
 */
class Knihovna_Tituly_Model_Source_Knihy
{
    public $knihy = array();

    public function __construct()
    {
        $this->knihy[0]['label'] = '-- Vyberte --';
        $this->knihy[0]['value'] = '';
        $knihy                   = Mage::getModel('tituly/tituly')->getCollection();
        /**@var $kniha Knihovna_JS_Model_Knihy */
        foreach ($knihy as $kniha) {
            $entity_id     = $kniha->getId();
            $z             = $kniha->load($entity_id);
            $nazev         = $z->getNazev();
            $this->knihy[] = array('value' => $entity_id, 'label' => $nazev);
        }
    }

    public function toOptionArray()
    {
        return $this->knihy;
    }
}