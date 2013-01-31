+<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Spike
 * Date: 3.1.13
 * Time: 14:41
 * To change this template use File | Settings | File Templates.
 */
class Knihovna_Tituly_Model_Source_Zanry
{
    public $zanry = array();

    public function __construct()
    {
                     $this->zanry[0]['label'] = '-- Vyberte --';
                     $this->zanry[0]['value'] = '';
                     $zanry                       = Mage::getModel('tituly/zanr')->getCollection();
        /**@var $zanr Knihovna_VJ_Model_Zanry */
        foreach ($zanry as $zanr) {
         $entity_id     = $zanr->getId();
         $z             = $zanr->load($entity_id);
         $nazev         = $z->getNazev();
         $this->zanry[] = array('value' => $entity_id, 'label' => $nazev);
        }
    }

    public function toOptionArray()
    {
        return $this->zanry;
    }
}
