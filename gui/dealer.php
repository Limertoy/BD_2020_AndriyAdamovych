<?php
$link = mysqli_connect('localhost', 'root', '', 'baza');
$sql4 = "SELECT * FROM `dealer` WHERE `ID_DEALERA` = " . $_GET["dealer_id"] . ";";
if ($result = mysqli_query($link, $sql4)) {
    $dealer = mysqli_fetch_array($result);
}
?>


<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="bootstrap.css">


    <title>Corona Car</title>
</head>

<body>
    <!---------------------------------------------------------------------->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <!---------------------------------------------------------------------->


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

    <!-- Treść strony -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-4" style="margin-top: 6%; text-align: center;">
                <img src="<?php echo "{$dealer['img_dealer']}" ?>" class="img-thumbnail" alt="Obrazek auta" style="width: 100%; max-width: 500px"><br><br>
                <h3><?php echo "{$dealer['Nazwa_dealera']}" ?></h3>
            </div>
            <div class="col-6" style="margin-top: 5%;">
                <h2>Informacja o dealerze:</h2>
                <table class="table">
                    <tbody>
                        <tr>
                            <td><strong>Kraj pochodzenia</strong></td>
                            <td><?php echo "{$dealer['Kraj_pochodzenia']}"  ?></td>
                        </tr>
                        <tr>
                            <td><strong>Opis dealera</strong></td>
                            <td><?php echo "{$dealer['Opis_dealera']}"  ?></td>
                        </tr>
                    </tbody>
                </table></br>
            </div>
            <div class="col-2"></div>
        </div>
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

<?php
mysqli_close($link)
?>