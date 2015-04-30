<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mimo (Michal Moc)
 * Date: 3.1.13
 * Time: 23:17
 * www: http://www.iguru.eu
 * email: info@iguru.eu
 */

class Knihovna_Zanr_Block_Adminhtml_Zanr_Renderer_Zanr extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    public function render(Varien_Object $row)
    {
        $value = $row->getData($this->getColumn()->getIndex());
        $zanr  = Mage::getModel('zanr/zanr')->load($value);
        return ($zanr->getNazev());
    }
}