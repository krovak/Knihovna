<?php
class Knihovna_Ctenar_Block_Info extends Mage_Core_Block_Template {
   public function getCtenar(){
       /** @var $ctenar Knihovna_Ctenar_Model_Ctenar */
       $ctenar=Mage::getModel('core/session')->getLoggedUser();
       if (!$ctenar){
          return false;

       }
       else {



               $form = new Varien_Data_Form();
               $this->setForm($form);
               $f    = $form->addFieldset(
                   'ctenar-nepovinne', array(
                       'legend' => 'Přidání nepovinných údajů',
                       'class'  => 'fieldset-wide'
                   )
               );
               $f->addField(
                   'mesto', 'text', array(
                       'name'     => 'mesto',
                       'label'    => 'Město',
                       'required' => false
                   )
               );
               $f->addField(
                   'psc', 'text', array(
                       'name'     => 'psc',
                       'label'    => 'PSČ',
                       'required' => false
                   )
               );
               $f->addField(
                   'heslo', 'password', array(
                       'name'     => 'heslo',
                       'label'    => 'Heslo',
                       'required' => false
                   )
               );
               $f->addField(
                   'potvrzeni_hesla', 'password', array(
                       'name'     => 'potvrzeni_hesla',
                       'label'    => 'Potvrzení hesla',
                       'required' => false
                   )
               );
               $f->addField(
                   'email', 'text', array(
                       'name'     => 'email',
                       'label'    => 'Email',
                       'required' => false
                   )
               );
               $f->addField(
                   'telefonni_cislo', 'text', array(
                       'name'     => 'telefonni_cislo',
                       'label'    => 'Telefonní číslo',
                       'required' => false
                   )
               );
               if (is_object($ctenar))
                   $form->setValues($ctenar->getData());
//            $form->setUseContainer(true);


           return $ctenar;

       }

   }

}
