<?php
/**
 * Created by PhpStorm.
 * User: mimo (Michal Moc)
 * Date: 10.10.14
 * Time: 12:26
 * www: http://www.iguru.eu
 * email: info@iguru.eu
 *
 * změna sloupce Autor z smallint na varchar z důvodu ukládání více autorů
 */

$installer  = $this;
$connection = $installer->getConnection();
$table      = $installer->getTable('tituly/knihovna_tituly');

$installer->startSetup();

$connection->modifyColumn($table, 'autor', 'VARCHAR(100)');

$installer->endSetup();
