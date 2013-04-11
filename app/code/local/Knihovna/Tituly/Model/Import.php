<?php
/**
 * Created by JetBrains PhpStorm.
 * User: sobotluc
 * Date: 28.2.13
 * Time: 11:22
 * To change this template use File | Settings | File Templates.
 */
class Knihovna_Tituly_Model_Import extends Mage_Core_Model_Abstract
{
    /**
     * @var string cesta k adresáři s médii
     */
    private $mediaDir;
    /**
     * @var string cesta k uloženým obrázkům knih, je v adresáři media
     */
    private $cover;

    /**
     *
     */
    public function __construct()
    {
        $this->mediaDir = Mage::getBaseDir('media'); //načtení adresy k médiím ze systému
        $this->cover    = Mage::getBaseUrl('media') . DS . 'cover' . DS; //nastavení kam chci ukládat obaly
    }

    /**
     * @param $path url na obalkyknih s isbn
     * @return string url kde najdu obrázek k danemu isbn
     */
    private function getHeader($path)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $path);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curl, CURLOPT_HEADER, 1);
        curl_setopt($curl, CURLOPT_NOBODY, 1);
        curl_exec($curl);
        $info = curl_getinfo($curl);
        return ($info['redirect_url']);
    }

    /**
     * @param $path string url souboru co chci stáhnout
     * @param $destination string kam uložit
     */
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

    /**
     * @param $isbn string číslo isbn nebo ean13
     */
    public function getInfo($isbn)
    { //stazeni obrazku z obalkyknih.cz
        $obrazek = $this->getHeader("http://www.obalkyknih.cz/api/cover?isbn=" . $isbn);
        $this->getFile($obrazek, $this->mediaDir . DS . 'cover' . DS . $isbn . '.png');

        //nacteni informaci z googleBook
        $xmlObj = simplexml_load_file('http://books.google.com/books/feeds/volumes?q=' . urlencode($isbn));

        $namespaces = $xmlObj->getNamespaces(true); //pouzivam namespace (dc)

        $child = $xmlObj->entry->children($namespaces['dc']); //vyhledam vsechny potomky s dc

        //TODO předělat posílání autora jako pole s ID autorů
        $creators     = '';
        $creators_arr = $child->creator;
        foreach ($creators_arr as $creator) {
            $creator_name = explode(' ',$creator);
            $creator_id = 1;
            //$creator_id = Mage::getModel('autor/autor')->getCollection()->getIdByName($creator_name[0],$creator_name[1]);
            $creators .= $creator_id . ', ';
        }
        $creators = substr($creators, 0, -2);
        $info     = array('autor'     => $creators,
                          'nazev'     => (string)$child->title,
                          'rokVydani' => (string)$child->date,
                          'format'    => $child->format,
                          'obrazek'   => $this->cover . $isbn . '.png'
        );
        echo Mage::helper('core')->jsonEncode($info); //vyrobim a vratim json objekt
    }
}
