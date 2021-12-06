<?php
// starte session
session_start();
// setzte Variablen aus dem Online-Formular
$vorname = isset($_POST['vorname']) ? $_POST['vorname'] : '';
$nachname = isset($_POST['nachname']) ? $_POST['nachname'] : '';
$shopname = isset($_POST['shopname']) ? $_POST['shopname'] : '';
$shopnamen = $shopname;
$shopnamen = strtolower(trim(preg_replace('/\s+/', '', $shopname)));
$_SESSION["shopname"] = isset($_POST['shopname']) ? $_POST['shopname'] : '';
$adresse = isset($_POST['adresse']) ? $_POST['adresse'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$telefon = isset($_POST['telefon']) ? $_POST['telefon'] : '';
$beschreibung = isset($_POST['beschreibung']) ? $_POST['beschreibung'] : '';

// benutze Variablen um Helm-Install-Befehl zusammen zu bauen 
$helminstall ="helm install $shopnamen --set shopname=$shopname --set vorname=$vorname --set nachname=$nachname --set adresse=$adresse --set telefon=$telefon --set email=$email /usr/share/nginx/html/vmallchart";
// bereistellen des shops mit individuellen Daten 
$output = shell_exec($helminstall);
echo $output;
?>
