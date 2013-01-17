<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mimo (Michal Moc)
 * Date: 17.1.13
 * Time: 12:28
 * www: http://www.iguru.eu
 * email: info@iguru.eu
 */

$zanry = array(
    array(
        'nazev' => 'Pohádka',

    ),
    array(
        'nazev' => 'Beletrie',
    ),
    array(
        'nazev' => 'Poezie',
    ));


foreach ($zanry as $zanr) {
    Mage::getModel('zanr/zanr')->setData($zanr)->save();
}
