<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mimo (Michal Moc)
 * Date: 15.11.12
 * Time: 13:56
 * www: http://www.iguru.eu
 * email: info@iguru.eu
 */
 
class Knihovna_Tituly_Block_Adminhtml_Tituly extends Mage_Adminhtml_Block_Widget_Grid_Container {

    public function _construct(){
        $this->_controller='adminhtml_tituly';
        $this->_blockGroup='tituly';
        $this->_addButton('test',array(
            'label'=>'text',

        ));
        parent::_construct();
    }
    public function getHeaderText(){
        return 'Tituly';
    }
}