<?php
//starte session 
session_start();
// nehme die Variable shopname aus der Session um dadurch an den Namespace zu gelangen
$shopname = $_SESSION["shopname"] ;
$shopnamen = preg_replace('/\s/', '', $shopname);
$shopnamen = strtolower(trim($shopnamen))
// fordere öffentliche IP-Adresse vom bestimmten namespace
$kubectlst = "./kubectl -n $shopnamen get service nginx -o jsonpath='{.status.loadBalancer.ingress[0].ip}'";
$status = shell_exec($kubectlst);
// gebe öffentliche IP-Adresse aus 
echo "Deine Adresse zu deinem V-Mall-Portal $shopname,\r\n";
echo "ist jetzt unter folgender IP-Adresse erreichbar ->  ";
echo "http://", $status,"\r\n";
echo "VIEL VERGNÜGEN!!!!!!";
?>