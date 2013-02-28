<?php
include('Hledac_knih.php');    
$googleBook = new Hledac_knih();

$book= $googleBook->Najdi_podle_ISBN('9788000027562');
echo $book['titre'];
echo '<img src="'.$book['image'].'">';
echo $book['editeur'];
echo $book['auteur'];
