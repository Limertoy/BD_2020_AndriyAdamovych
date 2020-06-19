<?php
session_start();
$link = oci_connect("student", "123456", "//localhost/kosmos");
$first1 = oci_parse($link, 'SELECT * FROM AUTO');
oci_execute($first1);
$result = oci_fetch_array($first1);
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="cart.css">
    <title>Historia zakupów - Corona Car</title>
</head>

<body class="text-center">

    <!---------------------------------------------------------------------->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <!---------------------------------------------------------------------->


    <!-- Nagłowek -->
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

    <!-- Treść strony -->
    <?php
    if (isset($_SESSION["name"])) {
        $history = oci_parse($link, "SELECT * FROM HISTORY WHERE ID_KLIENTA = ". $_SESSION["id"] ."");
        oci_execute($history);
    ?>
        <table class="table">
            <tbody>
                <thead>
                    <tr>
                        <th scope="col">Nr. Zakupu</th>
                        <th scope="col">Nazwa auta</th>
                        <th scope="col">Data zakupu</th>
                    </tr>
                </thead><?php while ($row = oci_fetch_assoc($history)) { ?>
                    <tr>
                        <td><?php echo $row["ID_ZAKUPU"] ?></td>
                        <td><?php echo $row["NAZWA_CAR"] ?></td>
                        <td><?php echo $row["DATA_ZAKUPU"] ?></td>
                    </tr>
            </tbody>
        </table>
    <?php
                        }
                    } else {
    ?>
    <div class="container-sm" style="text-align:center; padding: 10%">
        <h2>Brak aktywnego użytkównika.</h2><br><br>
        <a class="btn btn-outline-success" href="logowanie.php">Przejdź do logowania</a>
    </div>
<?php
                    }
?>
<!-- Stopka -->
<div class="footer">
    <p style="padding-top: 14px">
        © 2020 Copyright:
        <a class="white" href="index.html">Corona Car</a>
    </p>
</div>
</body>

</html>

<?php
oci_close($link);
?>