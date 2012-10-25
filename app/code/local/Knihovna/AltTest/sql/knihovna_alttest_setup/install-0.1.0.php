<?php
/**
 * Created by JetBrains PhpStorm.
 * User: altpetr
 * Date: 4.10.12
 * Time: 14:23
 * To change this template use File | Settings | File Templates.
 */ 
/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;

$installer->startSetup();

$table = $installer->getConnection() //pripojime se k databazi
    ->newTable($installer->getTable('knihovna_alttest/knihovna_alttest')) //resource knihovna_alttest, entita knihovna_alttest
    ->addColumn('entity_id',Varien_Db_Ddl_Table::TYPE_SMALLINT,null,array(
    'identity' => true,
    'nullable' => false,
    'primary'  => true,
),'Entity_id')
    ->addColumn('jmeno',Varien_Db_Ddl_Table::TYPE_VARCHAR,50,array(
    'nullable' => false //jmeno musi byt vyplneno
), 'Jméno')
    ->addColumn('prijmeni',Varien_Db_Ddl_Table::TYPE_VARCHAR,50,array(
    'nullable' => false //prijmeni musi byt take vyplneno
),'Příjmení');

$installer->getConnection()->createTable($table);

$installer->endSetup();