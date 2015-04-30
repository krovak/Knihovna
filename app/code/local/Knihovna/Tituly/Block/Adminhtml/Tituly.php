<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mimo (Michal Moc)
 * Date: 15.11.12
 * Time: 13:56
 * www: http://www.iguru.eu
 * email: info@iguru.eu
 */

/*
$defController = Mage::getBaseDir()
    . DS . 'app' . DS . 'code' . DS . 'core'
    . DS . 'Mage' . DS . 'Adminhtml' . DS . 'controllers'
    . DS . 'Sales' . DS . 'OrderController.php';
require_once $defController;*/


class Knihovna_Tituly_Block_Adminhtml_Tituly extends Mage_Adminhtml_Block_Widget_Grid_Container {

    public function _construct(){
        $this->_controller='adminhtml_tituly';
        $this->_blockGroup='tituly';
        parent::_construct();
    }
    public function getHeaderText(){
        return 'Tituly';
    }

    /**
     * Export order grid to CSVi format
     */
    public function exportCsvEnhancedAction()
    {
        $fileName   = 'knihy-' . gmdate('YmdHis') . '.csv';
        $grid       = $this->getLayout()->createBlock('adminhtml/tituly_grid');
        $this->_prepareDownloadResponse($fileName, $grid->getCsvFileEnhanced());
    }
}