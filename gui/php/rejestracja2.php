<?php
$link = mysqli_connect('localhost', 'root', '', 'baza');
if (isset($_POST['name'])) { $name = $_POST['name']; }
if (isset($_POST['tel'])) {$tel = $_POST['tel']; }
if (isset($_POST['email'])) {$email = $_POST['email']; }
if (isset($_POST['password'])) {$password = $_POST['password']; }

if (!$link) {
    echo 'Nie mogę podłączyć do bazy. Kod błędu: ' . mysqli_connect_errno() . ', błąd: ' . mysqli_connect_error();
    exit;
}

if(!empty($email)){
$sql_e = "SELECT * FROM `klient` WHERE Email_klienta='$email'";
$res_e = mysqli_query($link, $sql_e);



if (mysqli_num_rows($res_e) > 0) {
    $email_error = "Ten email już jest zarejestrowany!";
} else {
    $query = "INSERT INTO klient (Imie, Telefon_klienta, Email_klienta, Haslo) 
      	    	  VALUES ('$name', '$tel', '$email', '$password')";
    $results = mysqli_query($link, $query);
    $email_success = "Użytkownik został dodany.";
}
}
mysqli_close($link);
?>
