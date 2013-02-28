<?php
/**
 * Created by JetBrains PhpStorm.
 * User: sobotluc
 * Date: 28.2.13
 * Time: 11:22
 * To change this template use File | Settings | File Templates.
 */

class Knihovna_Tituly_Model_Import extends Mage_Core_Model_Abstract{
    private $mediaDir;
    public function __construct(){
        $this->mediaDir = Mage::getBaseDir('media');
    }
    private function getFile($path, $destination)
    {
        $fp = fopen($destination, "w");
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $path);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_FILE, $fp);
        curl_exec($curl);
        fclose($fp);
    }
    public function test(){
        $this->getFile('http://iguru.eu/img/logo.png',$this->mediaDir);
    }
}