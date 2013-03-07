<?php
/**
 * Created by JetBrains PhpStorm.
 * User: sobotluc
 * Date: 28.2.13
 * Time: 11:22
 * To change this template use File | Settings | File Templates.
 */
include('Hledac_knih.php');
class Knihovna_Tituly_Model_Import extends Mage_Core_Model_Abstract
{
    private $mediaDir;

    public function __construct()
    {
        $this->mediaDir = Mage::getBaseDir('media');
    }

    private function getFile($path, $destination)
    {
        $fp   = fopen($destination, "w");
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $path);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_FILE, $fp);
        curl_exec($curl);
        fclose($fp);
    }

    public function getInfo($isbn)
    {
        //$googleBook = new Hledac_knih();
//        $isbn ='8024739178';
        $xmlObj = simplexml_load_file('http://books.google.com/books/feeds/volumes?q=' . urlencode($isbn) . '&key=AIzaSyBkej3GqHNeBBHV3PdsKCMvGbDYYjxQQFo&projection=full');
//http://books.google.com/books/feeds/volumes?q=8024739178&key=AIzaSyBkej3GqHNeBBHV3PdsKCMvGbDYYjxQQFo&projection=full');
        $namespaces = $xmlObj->getNamespaces(true);

//        $child = $xmlObj->entry->children($namespaces['dc']);
//        var_dump($child->creator);

        $this->getFile("http://www.obalkyknih.cz/api/cover?isbn=978-80-7211-362-0", "kniha.png");

    }
}


