<?php
session_start();
$username="root";
$host="localhost";
$database="baza";
$password="";
$link = mysqli_connect($host, $username, $password, $database);
if (!$link) {
    echo 'Nie mogę podłączyć do bazy. Kod błędu: ' . mysqli_connect_errno() . ', błąd: ' . mysqli_connect_error();
    exit;
  }


$id_auta = $_GET["car_id"];
$sql = "SELECT `ID_AUTA`, `Nazwa`, `Rok`, `Przebieg`, `Pojemnosc`, `Moc`, `Cena`, `ID_DEALERA`, `ID_SKLEPU`, `img_auto` FROM `auto` WHERE `ID_AUTA` = " .$id_auta. ";";
if ($result1=mysqli_query($link, $sql)){
    $auto = mysqli_fetch_array($result1);
    $sql2 = "SELECT * FROM `dealer` WHERE `ID_DEALERA` = ".$auto['ID_DEALERA'].";";
    $sql3 = "SELECT * FROM `sklep` WHERE `ID_SKLEPU` = ".$auto['ID_SKLEPU'].";";
    if($result2 = mysqli_query($link, $sql2)){
        $dealer1 = mysqli_fetch_array($result2);
    }
    if($result3 = mysqli_query($link, $sql3)){
        $sklep1 = mysqli_fetch_array($result3);
    }
}


?>
