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

$table = $installer->getConnection()
    ->newTable($installer->getTable('titest/knihovna_titest'))
    ->addColumn(
        'entity_id', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
                                                                    'identity' => true,
                                                                    'nullable' => false,
                                                                    'primary'  => true,
                                                               ), 'Entity_id'
    )
    ->addColumn(
        'cislo_prukazu', Varien_Db_Ddl_Table::TYPE_INTEGER,null, array(
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
        'cp', Varien_Db_Ddl_Table::TYPE_INTEGER,null, array(
                                                      'nullable' => false
                                                 ), 'Čp'
    )
    ->addColumn(
        'mesto', Varien_Db_Ddl_Table::TYPE_VARCHAR, 50, array(
                                                             'nullable' => false
                                                        ), 'Město'
    )
    ->addColumn(
        'psc', Varien_Db_Ddl_Table::TYPE_INTEGER,null, array(
                                                       'nullable' => false
                                                  ), 'PSČ'
    )
    ->addColumn(
        'vypujcka', Varien_Db_Ddl_Table::TYPE_INTEGER,null, array(
                                                            'nullable' => false
                                                       ), 'Výpůjčka'
    );

$installer->getConnection()->createTable($table);

$installer->endSetup();
