<?php
include('php/logowanie2.php');
if (isset($_SESSION["id"])) {
    header("Location:konto.php");
}
?>


<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="bootstrap.css">


    <title>Logowanie - Corona Car</title>
</head>

<body>
    <!---------------------------------------------------------------------->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <!---------------------------------------------------------------------->
    <script>
        function myFunction() {
            var x = document.getElementById("loginPassword");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>

    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-dark " style="background-color: #3cba23;">
        <a class="navbar-brand" href="index.html">Corona Car</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.html">Strona główna</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="katalog.php">Wybierz auto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="history.php">Historia zamówień</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="konto.php">Moje konto</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- -->
    <div class="container" style="margin-top: 6%;">
        <h2 style="text-align: center;">Logowanie</h2>
        <form method="post" id="login">
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Wpisz email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Hasło</label>
                <input type="password" name="password" class="form-control" id="loginPassword" placeholder="Wpisz hasło">
                <input type="checkbox" onclick="myFunction()">Pokaż hasło<br>
                <span style="color: red;"><?php if ($message != "") {
                                                echo $message;
                                            } ?></span><br>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form><br>
        <h4>Nie masz konta? <a href="rejestracja.php" style="color:#3cba23">Załóż nowe konto.</a></h4>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p style="padding-top: 14px">
            © 2020 Copyright:
            <a class="white" href="index.html">Corona Car</a>
        </p>
    </div>

</body>

</html>