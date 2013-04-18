<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mimo (Michal Moc)
 * Date: 3.1.13
 * Time: 23:06
 * www: http://www.iguru.eu
 * email: info@iguru.eu
 */

class Knihovna_Autor_Block_Adminhtml_Autor_Renderer_Autor extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    public function render(Varien_Object $row)
    {
        $value = $row->getData($this->getColumn()->getIndex());
        return $value;
        //$autor = Mage::getModel('autor/autor')->load($value);
        //return ($autor->getJmeno() . ' ' . $autor->getPrijmeni());
    }

}