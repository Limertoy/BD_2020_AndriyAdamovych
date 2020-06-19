<?php
$link = oci_connect("student", "123456", "//localhost/kosmos");
$first = "SELECT * FROM AUTO WHERE HIDDENN = 0";
$first_result = oci_parse($link, $first);
oci_execute($first_result);
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="bootstrap.css">
    <title>Wybór auta - Corona Car</title>
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

    <div class="container" style="padding-top: 20px;">
        <h2 style="color: #3cba23;">Corona Car - tu znajdziesz auto, które zawsze chciałeś!</h2>
        <div class="row">
            <div class="col">
                <div class="row">
                    <?php
                    
                        while ($row = oci_fetch_assoc($first_result)) {
                            

                    ?>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="card">
                                    <img class="card-img-top" src="<?php echo $row["IMG_AUTO"] ?>" alt="Brak obrazu auta">
                                    <div class="card-body">
                                        <h4 class="card-title"><?php echo $row["NAZWA"] ?></h4>
                                        <p class="card-text">Rok: <?php echo $row["ROK"] ?></p>
                                        <div class="row">
                                            <div class="col">
                                                <p class="btn btn-outline-danger disabled"><?php echo $row["CENA"] ?>$</p>
                                            </div>
                                            <div class="col">
                                                <a href="car.php?car_id=<?php echo $row["ID_AUTA"] ?>" class="btn btn-success btn-block">Zobacz</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                    }
                     ?>
                </div>
            </div>

        </div>
    </div><br><br>
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