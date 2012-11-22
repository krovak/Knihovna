<?php

$installer = $this;

$installer->startSetup();

$table = $installer->getConnection()
    ->newTable($installer->getTable('vj/knihovna_vj'))
    ->addColumn('entity_id', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
    'identity' => true,
    'nullable' => false,
    'primary'  => true,
), 'Entity_id')
    ->addColumn('jmeno',Varien_Db_Ddl_Table::TYPE_VARCHAR,50,array(
    'nullable' => false
),'Jméno')
    ->addColumn('prijmeni',Varien_Db_Ddl_Table::TYPE_VARCHAR,50,array(
    'nullable' => false
),'Příjmení');

$installer->getConnection()->createTable($table);

$installer->endSetup();