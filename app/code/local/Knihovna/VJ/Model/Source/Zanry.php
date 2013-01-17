<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Spike
 * Date: 3.1.13
 * Time: 14:41
 * To change this template use File | Settings | File Templates.
 */
class Knihovna_VJ_Model_Source_Zanry
{
    public $zanry = array();

    public function __construct()
    {
        $this->zanry[0]['label'] = '-- Vyberte --';
        $this->zanry[0]['value'] = '';
        $zanry                       = Mage::getModel('vj/zanry')->getCollection();
        /**@var $zanr Knihovna_VJ_Model_Zanry */
        foreach ($zanry as $zanr) {
            $id            = $zanr->getId();
            $z             = $zanr->load($id);
            $name          = $z->getName();
            $this->zanry[] = array('value' => $id, 'label' => $name);
        }
    }

    public function toOptionArray()
    {
        return $this->zanry;
    }
}