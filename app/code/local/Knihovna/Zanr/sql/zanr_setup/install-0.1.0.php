<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tichave4
 * Date: 22.11.12
 * Time: 13:35
 * To change this template use File | Settings | File Templates.
 */
/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;

$installer->startSetup();

$tableZ = $installer->getConnection()
    ->newTable($installer->getTable('tituly/knihovna_zanr'))
    ->addColumn('entity_id', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
    'identity' => true,
    'nullable' => false,
    'primary'  => true,
), 'Entity_id')
    ->addColumn('nazev', Varien_Db_Ddl_Table::TYPE_VARCHAR, 100, array(
    'nullable' => false
), 'Název');
$tableT = $installer->getConnection()
    ->newTable($installer->getTable('tituly/knihovna_tituly'))
    ->addColumn('entity_id', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
    'identity' => true,
    'nullable' => false,
    'primary'  => true,
), 'Entity_id')
    ->addColumn('nazev',Varien_Db_Ddl_Table::TYPE_VARCHAR,50,array(
    'nullable' => false
),'Název')
    ->addColumn('autor',Varien_Db_Ddl_Table::TYPE_SMALLINT,null,array(
    'nullable' => false
),'Autor')
    ->addColumn('isbn',Varien_Db_Ddl_Table::TYPE_VARCHAR,50,array(
    'nullable' => true
),'ISBN')
    ->addColumn('pocet_stranek',Varien_Db_Ddl_Table::TYPE_SMALLINT,null,array(
    'nullable' => true
),'Počet stránek')
    ->addColumn('rok_vydani',Varien_Db_Ddl_Table::TYPE_SMALLINT,null,array(
    'nullable' => false
),'Rok vydání')
    ->addColumn('zanr',Varien_Db_Ddl_Table::TYPE_SMALLINT,null,array(
    'nullable' => false
),'Žánr');

$installer->getConnection()->createTable($tableT);
$installer->getConnection()->createTable($tableZ);

$installer->endSetup();