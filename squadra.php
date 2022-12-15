<?php
use DB\DBAccess;

require_once "..". DIRECTORY_SEPARATOR ."connessione.php";

$paginaHTML = file_get_contents("squadrea.html");

$connessione = new DBAccess();
$stringaGiocatori = "";
$connOk = $connessione->openDBConnection();

if($connOk) {
    $stringaGiocatori = "";
} else {
    $stringaGiocatori = "<p>I sistemi sono momantanemanete fuori servizio, ci scusiamo per il disagio.</p>";
}

str_replace("<listaGiocatori />", $stringaGiocatori, $paginaHTML);

?>