<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mimo
 * Date: 15.11.12
 * Time: 13:04
 * To change this template use File | Settings | File Templates.
 */
/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;

$installer->startSetup();

$table = $installer->getConnection()
    ->newTable($installer->getTable('knihovna/knihovna_knihovna'))
    ->addColumn('entity_id', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
    'identity' => true,
    'nullable' => false,
    'primary'  => true,
), 'Entity_id')
    ->addColumn('nazev',Varien_Db_Ddl_Table::TYPE_VARCHAR,45,array(
    'nullable' => false
),'Název')
    ->addColumn('adresa',Varien_Db_Ddl_Table::TYPE_VARCHAR,100,array(
    'nullable' => false
),'Adresa');

$installer->getConnection()->createTable($table);

$installer->endSetup();