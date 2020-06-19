<?php
session_start();
$link = oci_connect("student", "123456", "//localhost/kosmos");

$id_auta = $_GET["car_id"];
$sql = "SELECT * FROM AUTO WHERE ID_AUTA = ".$id_auta."";
$result1 = oci_parse($link, $sql);
    oci_execute($result1);
    $auto = oci_fetch_assoc($result1);
    $sql2 = "SELECT * FROM DEALER WHERE ID_DEALERA = ".$auto['ID_DEALERA']."";
    $sql3 = "SELECT * FROM SKLEP WHERE ID_SKLEPU = ".$auto['ID_SKLEPU']."";
    $result2 = oci_parse($link, $sql2);
    oci_execute($result2);
    $dealer1 = oci_fetch_assoc($result2);
    $result3 = oci_parse($link, $sql3);
    oci_execute($result3);
    $sklep1 = oci_fetch_assoc($result3);
?>
