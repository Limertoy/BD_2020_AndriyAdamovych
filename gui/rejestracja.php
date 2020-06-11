<?php
include('php/rejestracja2.php');
?>


<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="bootstrap.css">


    <title>Rejestracja</title>
</head>

<body>
    <!---------------------------------------------------------------------->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <!---------------------------------------------------------------------->
    <script>
        function check(input) {
            if (input.value != document.getElementById('registryPassword').value) {
                input.setCustomValidity('Hasła się róźnią.');
            } else {
                input.setCustomValidity('');
            }
        }

        function myFunction() {
            var x = document.getElementById("registryPassword");
            var x2 = document.getElementById("rePass");
            if (x.type === "password") {
                x.type = "text";
                x2.type = "text";
            } else {
                x.type = "password";
                x2.type = "password";
            }
        }

        function submitForm() {
            var frm = document.getElementsByName('contact-form')[0];
            frm.submit();
            frm.reset();
            return false;
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
    <div class="container" style="margin-top: 4%">
        <h2 style="text-align: center;">Rejestracja nowego konta</h2>
        <form method=post action="#" id="register">
            <div class="form-group">
                <label for="nameInput">Imię</label>
                <input type="name" name="name" class="form-control" id="nameInput" required placeholder="Wprowadź imię i nazwisko" />
            </div>
            <div class="form-group">
                <label for="nameInput">Numer telefonu</label>
                <input type="tel" name="tel" class="form-control" id="telInput" required placeholder="Wprowadź numer telefonu" />
            </div>
            <div <?php if (isset($email_error)) : ?> class="form-error" <?php endif ?>>
                <label for="exampleInputEmail1">Email</label>
                <input type="email" name="email" class="form-control" id="registryEmail" aria-describedby="emailHelp" required placeholder="Wpisz email" />
                <?php if (isset($email_error)) : ?>
                    <span style="color: red"><?php echo $email_error; ?></span>
                <?php endif ?>
            </div>
            <div class="form-group">
                <label for="registryPassword">Hasło</label>
                <input type="password" name="password" class="form-control" id="registryPassword" required placeholder="Wpisz hasło" />
                <input type="checkbox" onclick="myFunction()">Pokaż hasło<br>
            </div>
            <div class="form-group">
                <label for="rePass">Powtórz hasło</label>
                <input type="password" class="form-control" id="rePass" required placeholder="Powtórz hasło" oninput="check(this)" />
            </div>
            <button type="submit" onsubmit="sumbitForm()" class="btn btn-success">Submit</button>
        </form>
    </div>

    <!-- Footer -->
    <footer class="footer fixed-bottom" style="height: 50px; padding: 14px">
        © 2020 Copyright:
        <a class="white" href="index.html">Corona Car</a>
    </footer>

</body>

</html>