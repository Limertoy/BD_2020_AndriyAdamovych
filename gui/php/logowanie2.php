<?php
$link = mysqli_connect('localhost', 'root', '', 'baza');
if (isset($_POST['email'])) {$email = $_POST['email']; }
if (isset($_POST['password'])) {$password = $_POST['password']; }

if (!$link) {
    echo 'Nie mogę podłączyć do bazy. Kod błędu: ' . mysqli_connect_errno() . ', błąd: ' . mysqli_connect_error();
    exit;
}
session_start();
$message = "";
if(count($_POST)>0){
    $result = mysqli_query($link, "SELECT * FROM `klient` WHERE `Email_klienta`='". $_POST["email"] ."' and `Haslo` = '" . $_POST["password"] ."'");
    $row = mysqli_fetch_array($result);
    if(is_array($row)){
    $_SESSION["id"] = $row['ID_KLIENTA'];
    $_SESSION["name"] = $row['Imie'];
    $_SESSION["tel"] = $row['Telefon_klienta'];
    $_SESSION["email"] = $row['Email_klienta'];
    } else {
    $message = "Invalid Username or Password!";
    }
}
?>