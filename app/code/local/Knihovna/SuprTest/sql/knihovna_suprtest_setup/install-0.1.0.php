<?php
/**
 * @author: Premek Sumpela <supr32@gmail.com>
 */ 
/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;

$installer->startSetup();

$table = $installer->getConnection()
    ->newTable($installer->getTable('suprtest/test'))
    ->addColumn('test_id',Varien_Db_Ddl_Table::TYPE_SMALLINT,null,array(
    'identity' => true,
    'nullable' => false,
    'primary' => true,
),'Test ID')
    ->addColumn('title',Varien_Db_Ddl_Table::TYPE_VARCHAR,255,array(
    'nullable' => false,
),'Nazev')
    ->addColumn('creation_time',Varien_Db_Ddl_Table::TYPE_TIMESTAMP,null,array(),'Creation Time')
    ->setComment('Testovací VitaTest');
$installer->getConnection()->createTable($table);

$installer->endSetup();
