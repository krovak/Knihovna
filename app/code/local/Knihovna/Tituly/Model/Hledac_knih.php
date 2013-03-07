<?php

class Hledac_knih
{
    private $kniha;

    public function __construct()
    {
    }

    public function Najdi_knihu($slovo)
    {
        $this->kniha = new XMLReader();
        $knihy       = array();

        if ($this->kniha->open('http://books.google.com/books/feeds/volumes?q=' . urlencode($slovo))) {
            $this->Nazacatek();
            $knihy = array();

            while ($this->kniha->name == "entry") {
                $knihy[] = $this->prevedKnihu();
            }
        }

        return $knihy;
    }

    public function najdi_podle_ISBN($isbn)
    {
        $this->kniha = new XMLReader();

        if ($this->kniha->open('http://books.google.com/books/feeds/volumes?q=' . urlencode($isbn))) {
            var_dump($this->kniha);
            die;
            $this->Nazacatek();

            $found = false;
            while ($this->kniha->name == "entry") {
                $book = $this->prevedKnihu();

                if (isset($book['identifier']) &&
                    (strlen($isbn) == 10 && isset($book['identifier']['ISBN']) && $book['identifier']['ISBN'] == $isbn) || // ISBN
                    (strlen($isbn) == 13 && isset($book['identifier']['ISBN2']) && $book['identifier']['ISBN2'] == $isbn)
                ) // ISBN2
                {
                    $found = true;
                    break;
                }
            }
        }

        return (!isset($book) || !$found) ? null : $book;
    }

    private function prevedKnihu()
    {
        $book = array();

        while ($this->kniha->read() && $this->kniha->name != "entry") {
            if ($this->kniha->name{0} == "#")
                continue;

            switch ($this->kniha->name) {
                case 'dc:creator':
                    if (!isset($book['auteur']))
                        $book['auteur'] = '';
                    else
                        $book['auteur'] .= ', ';
                    $book['auteur'] .= $this->Autor();
                    break;
                case 'dc:date':
                    $dt = explode('-', $this->Datum());

                    $book['date'] = mktime(0, 0, 0, (isset($dt[2]) ? $dt[2] : 1), (isset($dt[1]) ? $dt[1] : 1), $dt[0]);
                    break;
                case 'dc:identifier':
                    if (!isset($book['identifier'])) {
                        $book['identifier'] = array();
                    }
                    $dt                              = $this->Identifikator();
                    $book['identifier'][$dt['type']] = $dt['data'];
                    break;
                case 'dc:title':
                    if (!isset($book['titre']))
                        $book['titre'] = '';
                    else
                        $book['titre'] .= ', ';
                    $book['titre'] .= $this->Titul();
                    break;
                case 'dc:publisher':
                    $book['editeur'] = $this->Vydavatel();
                    break;
                case 'link' :
                    $dt = $this->odkaz();

                    if ($dt['name'] == 'thumbnail') {
                        $book['image'] = $dt['href'];
                    }
                    break;
            }
        }

        $this->kniha->read();

        return $book;
    }

    private function Vydavatel()
    {
        $this->kniha->read();
        $val = $this->kniha->value;
        $this->kniha->read();
        return $val;
    }

    private function Autor()
    {
        $this->kniha->read();
        $val = $this->kniha->value;
        $this->kniha->read();
        return $val;
    }

    private function Datum()
    {
        $this->kniha->read();
        $val = $this->kniha->value;
        $this->kniha->read();
        return $val;
    }

    private function Titul()
    {
        $this->kniha->read();
        $val = $this->kniha->value;
        $this->kniha->read();
        return $val;
    }

    private function odkaz()
    {
        $dt         = array();
        $dt['type'] = $this->kniha->getAttribute('type');
        $dt['name'] = substr($this->kniha->getAttribute('rel'), strrpos($this->kniha->getAttribute('rel'), '/') + 1);
        $dt['href'] = html_entity_decode($this->kniha->getAttribute('href'));

        return $dt;
    }

    private function Identifikator()
    {
        $this->kniha->read();
        $val = $this->kniha->value;
        $this->kniha->read();

        $dt = array();
        if (substr($val, 0, 5) == 'ISBN:') {
            $dt['type'] = 'ISBN';
            $dt['data'] = trim(substr($val, 5));

            if (strlen($dt['data']) == 13)
                $dt['type'] .= '2';
        } else {
            $dt['type'] = 'googleid';
            $dt['data'] = $val;
        }

        return $dt;
    }

    private function Nazacatek()
    {
        while ($this->kniha->name != "entry") {
            if (!$this->kniha->read())
                break;
        }
    }
}

?>