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


    <!-- Nagłowek -->
    <nav class="navbar navbar-expand-lg navbar-dark " style="background-color: #3cba23;">
        <a class="navbar-brand" href="#">Corona Car</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Strona główna</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Wybierz auto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Koszyk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Logowanie</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Treść strony -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-4" style="margin-top: 6%; text-align: center;">
                <img src="img/example.jpg" class="img-thumbnail" alt="Obrazek auta" style="width: 100%; max-width: 500px"><br><br>
                <h3>[Nazwa samochodu]</h3>
            </div>
            <div class="col-6" style="margin-top: 5%;">
                <h2>Сharakterystyki auta:</h2>
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td><strong>Rok</strong></td>
                            <td>2020</td>
                        </tr>
                        <tr>
                            <td><strong>Przebieg</strong></td>
                            <td>0 km</td>
                        </tr>
                        <tr>
                            <td><strong>Pojemność silnika</strong></td>
                            <td>3.5L</td>
                        </tr>
                        <tr>
                            <td><strong>Moc silnika</strong></td>
                            <td>350 KM</td>
                        </tr>
                        <tr>
                            <td><strong>Cena (w dolarach)</strong></td>
                            <td>100.000$</td>
                        </tr>
                    </tbody>
                </table></br>
                <button class="btn btn-success">Dodaj do koszyka</button><br><br>
                <h5>Dowiedż wiecęj o <a href="dealer.php">dealerze...</a></h5>
            </div>
            <div class="col-2"></div>
        </div>
    </div>


    <!-- Stopka -->
    <footer class="footer fixed-bottom">
        © 2020 Copyright:
        <a class="white" href="index.php">Corona Car</a>
        </div>
    </footer>

</body>

</html>