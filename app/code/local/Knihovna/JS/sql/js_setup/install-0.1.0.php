<?php
/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;

$installer->startSetup();

$table = $installer->getConnection()
    ->newTable($installer->getTable('js/knihovna_js'))
    ->addColumn('entity_id', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
    'identity' => true,
    'nullable' => false,
    'primary'  => true,
), 'Entity_id')
    ->addColumn('reader',Varien_Db_Ddl_Table::TYPE_SMALLINT, null,array(
    'nullable' => false
),'Čtenář')
    ->addColumn('from',Varien_Db_Ddl_Table::TYPE_DATE, null,array(
    'nullable' => false
),'Datum od')
    ->addColumn('to',Varien_Db_Ddl_Table::TYPE_DATE, null,array(
    'nullable' => false
),'Datum do')
    ->addColumn('book',Varien_Db_Ddl_Table::TYPE_SMALLINT, null,array(
    'nullable' => false
),'Kniha');

$installer->getConnection()->createTable($table);

$installer->endSetup();