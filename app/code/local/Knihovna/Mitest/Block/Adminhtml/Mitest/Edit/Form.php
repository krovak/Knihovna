<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mimo (Michal Moc)
 * Date: 29.11.12
 * Time: 15:07
 * www: http://www.iguru.eu
 * email: info@iguru.eu
 */
 
class Knihovna_Mitest_Block_Adminhtml_Mitest_Edit_Form
  extends Mage_Adminhtml_Block_Widget_Form {

    public function _construct(){
         parent::_construct();
         $this->setId('mitestForm');
         $this->setTitle('Přidat záznam');
     }
     public function _prepareForm(){
         $form = new Varien_Data_Form(array(
             'id'=>'mitestForm',
             'method'=>'Post'
         ));
         $f = $form->addFieldset('mitest',array(
             'legend'=>'Přidat autora',
             'class'=>'fieldset-wide'
         ));
         $f->addField('jmeno','text',array(
             'name'=>'jmeno',
             'label'=>'Jméno',
             'required'=>true
         ));
         $form->setUseContainer(true);
         $form->setAction($this->getUrl('*/*/save'));
         $this->setForm($form);
         return parent::_prepareForm();
     }
}