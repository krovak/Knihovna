<?php
class Knihovna_Ctenar_Block_Info extends Mage_Core_Block_Template {
   public function getCtenar(){
       /** @var $ctenar Knihovna_Ctenar_Model_Ctenar */
       $ctenar=Mage::getModel('core/session')->getLoggedUser();
       if (!$ctenar){
          return false;

       }
       else {
           return $ctenar;
       }

   }

}
