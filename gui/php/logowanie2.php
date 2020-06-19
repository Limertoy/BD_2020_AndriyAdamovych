<?php
$link = oci_connect("student", "123456", "//localhost/kosmos");
if (isset($_POST['email'])) {$email = $_POST['email']; }
if (isset($_POST['password'])) {$password = $_POST['password']; }

session_start();
$message = "";
if(count($_POST)>0){
    $result = oci_parse($link, "SELECT * FROM KLIENT WHERE EMAIL_KLIENTA='". $_POST["email"] ."' and HASLO = '" . $_POST["password"] ."'");
    oci_execute($result);
    $row = oci_fetch_array($result);
    if(is_array($row)){
    $_SESSION["id"] = $row['ID_KLIENTA'];
    $_SESSION["name"] = $row['IMIE'];
    $_SESSION["tel"] = $row['TELEFON_KLIENTA'];
    $_SESSION["email"] = $row['EMAIL_KLIENTA'];
    } else {
    $message = "Invalid Username or Password!";
    }
}
?>