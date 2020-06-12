<?php
session_start();
$link = mysqli_connect("localhost", "root", "", "baza");
$car = 'SELECT `Nazwa` FROM `auto`;';
$sklep = 'SELECT `ID_SKLEPU` FROM `sklep`;';
$dealer = 'SELECT `ID_DEALERA` FROM `dealer`;';

if(isset($_POST["usun"])){
    $bank2 = 'DELETE FROM `auto` WHERE `Nazwa` = "'.$_POST["cars"].'";';
    mysqli_query($link, $bank2);
}

if(isset($_POST["dodaj"])){
    $bank = 'INSERT INTO `auto`(`Nazwa`, `Rok`, `Przebieg`, `Pojemnosc`, `Moc`, `Cena`, `ID_DEALERA`, `ID_SKLEPU`, `img_auto`, `Hidden`) 
    VALUES ("'.$_POST["nazwa"].'",'.$_POST["rok"].',"'.$_POST["przebieg"].'","'.$_POST["pojemnosc"].'","'.$_POST["moc"].'",'.$_POST["cena"].','.$_POST["idd"].','.$_POST["ids"].',"'.$_POST["obraz"].'", 0)';
    mysqli_query($link, $bank);
}

if(isset($_POST["edytuj"])){
    $bank3 = 'UPDATE `auto` SET `Cena` = "'.$_POST["cenanew"].'" WHERE `Nazwa` = "'.$_POST["updt"].'";';
    if(mysqli_query($link, $bank3)){

    } else {
        echo mysqli_errno($link) . ": " . mysqli_error($link). "\n";
    }
}
?>