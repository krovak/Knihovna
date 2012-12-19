<?php

$installer = $this;

$installer->startSetup();

$table = $installer->getConnection()
    ->newTable($installer->getTable('patest/knihovna_patest'))
    ->addColumn('entity_id', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
    'identity' => true,
    'nullable' => false,
    'primary'  => true,
), 'Entity_id')
    ->addColumn('nazev',Varien_Db_Ddl_Table::TYPE_VARCHAR,45,array(
    'nullable' => false
),'Název oddělení');

$installer->getConnection()->createTable($table);

$installer->endSetup();