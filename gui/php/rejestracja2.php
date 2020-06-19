<?php
$link = oci_connect("student", "123456", "//localhost/kosmos");
if (isset($_POST['name'])) { $name = $_POST['name']; }
if (isset($_POST['tel'])) {$tel = $_POST['tel']; }
if (isset($_POST['email'])) {$email = $_POST['email']; }
if (isset($_POST['password'])) {$password = $_POST['password']; }


if(!empty($email)){
$sql_e = "SELECT * FROM KLIENT WHERE EMAIL_KLIENTA='$email'";
$res_e = oci_parse($link, $sql_e);
oci_execute($res_e);



if (oci_num_rows($res_e) > 0) {
    $email_error = "Ten email już jest zarejestrowany!";
} else {
    $query = "INSERT INTO KLIENT (IMIE, TELEFON_KLIENTA, EMAIL_KLIENTA, HASLO) 
      	    	  VALUES ('$name', '$tel', '$email', '$password')";
    $results = oci_parse($link, $query);
    oci_execute($results);
    $email_success = "Użytkownik został dodany.";
}
}
oci_close($link);
?>
