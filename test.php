<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Petr
 * Date: 23.4.14
 * Time: 0:53
 * To change this template use File | Settings | File Templates.
 */


$resource = Mage::getSingleton('core/resource');

/**
 * Retrieve the read connection
 */
$readConnection = $resource->getConnection('core_read');

/**
 * Retrieve the write connection
 */
$writeConnection = $resource->getConnection('core_write');