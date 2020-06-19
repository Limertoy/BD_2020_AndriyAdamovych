<?php
session_start();
$link = oci_connect("student", "123456", "//localhost/kosmos");
$car = 'SELECT ID_AUTA, NAZWA FROM AUTO';
$sklep = 'SELECT ID_SKLEPU, NAZWA_SKLEPU FROM SKLEP';
$dealer = 'SELECT ID_DEALERA, NAZWA_DEALERA FROM DEALER';

if(isset($_POST["usun"])){
    $bank2 = "BEGIN admindelete (".$_POST["cars"]."); END;";
    $tid = oci_parse($link, $bank2);
    oci_execute($tid);
}

if(isset($_POST["dodaj"])){
    $bank = "BEGIN adminadd('".$_POST["nazwa"]."',".$_POST["rok"].",'".$_POST["przebieg"]."','".$_POST["pojemnosc"]."','".$_POST["moc"]."',".$_POST["cena"].",".$_POST["idd"].",".$_POST["ids"].",'".$_POST["obraz"]."'); END;";
    $stid2 = oci_parse($link, $bank);
    oci_execute($stid2);
}

if(isset($_POST["edytuj"])){
    $bank3 = "BEGIN adminupdate(".$_POST["cenanew"].", ".$_POST["updt"]."); END;";
    $stid = oci_parse($link, $bank3);
    oci_execute($stid);
}
?>