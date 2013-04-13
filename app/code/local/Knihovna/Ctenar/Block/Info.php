<?php
class Knihovna_Ctenar_Block_Info extends Mage_Core_Block_Template {
   public function getCtenar(){
       /** @var $ctenar Knihovna_Ctenar_Model_Ctenar */
       $ctenar=Mage::getModel('core/session')->getLoggedUser();
       $ctenar->setData('cislo_prukazu', $ctenar->getCisloprukazky());
       if (!$ctenar){
          return false;

       }
       else {



           $form = new Varien_Data_Form(array(
               'id'     => 'edit_form',
               'method' => 'Post'
           ));
           $f    = $form->addFieldset(
               'ctenar', array(
                   'legend' => 'Přidat čtenáře',
                   'class'  => 'fieldset-wide'
               )
           );

           //return $ctenar; //pozdeji odkomentuju

       }

   }

}
