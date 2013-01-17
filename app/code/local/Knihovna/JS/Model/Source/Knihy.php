<?php
/**
 * Created by JetBrains PhpStorm.
 * User: admin
 * Date: 17.1.13
 * Time: 10:23
 * To change this template use File | Settings | File Templates.
 */
class Knihovna_JS_Model_Source_Knihy
{
    public $knihy = array();

    public function __construct()
    {
        $this->knihy[0]['label'] = '-- Vyberte --';
        $this->knihy[0]['value'] = '';
        $knihy                       = Mage::getModel('js/knihy')->getCollection();
        /**@var $kniha Knihovna_JS_Model_Knihy */
        foreach ($knihy as $kniha) {
            $id            = $kniha->getId();
            $z             = $kniha->load($id);
            $nazev          = $z->getNazev();
            $this->knihy[] = array('value' => $id, 'label' => $nazev);
        }
    }

    public function toOptionArray()
    {
        return $this->knihy;
    }
}