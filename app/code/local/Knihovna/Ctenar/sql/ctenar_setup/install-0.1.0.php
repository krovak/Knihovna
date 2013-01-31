<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tichave4
 * Date: 22.11.12
 * Time: 13:35
 */
/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;

$installer->startSetup();

$table = $installer->getConnection()
    ->newTable($installer->getTable('ctenar/knihovna_ctenar'))
    ->addColumn(
    'entity_id', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
        'identity' => true,
        'nullable' => false,
        'primary'  => true,
    ), 'Entity_id'
)
    ->addColumn(
    'cislo_prukazu', Varien_Db_Ddl_Table::TYPE_VARCHAR, 20, array(
        'nullable' => false
    ), 'Číslo průkazu'
)
    ->addColumn(
    'jmeno', Varien_Db_Ddl_Table::TYPE_VARCHAR, 50, array(
        'nullable' => false
    ), 'Jméno'
)
    ->addColumn(
    'prijmeni', Varien_Db_Ddl_Table::TYPE_VARCHAR, 50, array(
        'nullable' => false
    ), 'Příjmení'
)
    ->addColumn(
    'ulice', Varien_Db_Ddl_Table::TYPE_VARCHAR, 50, array(
        'nullable' => false
    ), 'Ulice'
)
    ->addColumn(
    'cp', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'nullable' => true
    ), 'Čp'
)
    ->addColumn(
    'mesto', Varien_Db_Ddl_Table::TYPE_VARCHAR, 50, array(
        'nullable' => true
    ), 'Město'
)
    ->addColumn(
    'psc', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'nullable' => true
    ), 'PSČ'
)
    ->addColumn(
    'heslo',Varien_Db_Ddl_Table::TYPE_VARCHAR,255, array(
        'nullable' => false
    ),'Heslo'
)
    ->addColumn(
    'email',Varien_Db_Ddl_Table::TYPE_VARCHAR,255, array(
        'nullable'=> true
    ),'Email'
)
    ->addColumn(
    'telefonni_cislo',Varien_Db_Ddl_Table::TYPE_VARCHAR,20, array(
        'nullable'=>true
    ),'Telefonní číslo'

)
;

$installer->getConnection()->createTable($table);

$installer->endSetup();
