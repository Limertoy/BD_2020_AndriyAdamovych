<?php
include('php/php.php');
$firstsql = oci_parse($link, $sql);
oci_execute($firstsql);
while ($result = oci_fetch_assoc($firstsql)) {
    if (isset($_SESSION["name"])) {
        $buy = 'INSERT INTO HISTORY (ID_AUTA, ID_KLIENTA, DATA_ZAKUPU, NAZWA_CAR) VALUES (' . $id_auta . ', ' . $_SESSION["id"] . ', "' . date("Y-m-d") . '", "' . $result['NAZWA'] . '")';
        $sell = 'UPDATE AUTO SET HIDDEN = 1 WHERE ID_AUTA = ' . $id_auta . ';';
        if (isset($_POST["sumbit"])) {
            $buy1 = oci_parse($link, $buy);
            oci_execute($buy1);
            $sell1 = oci_parse($link, $sell);
            oci_execute($sell1);
            $message = "Piękny wybór! Auto kupione!";
            echo "<script type='text/javascript'>alert('$message');</script>";
            header("Location: katalog.php");
        }
    } else {
        if (isset($_POST["sumbit"])) {
            $message = "Proszę najpierw zalogować się!";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }
?>



    <!DOCTYPE html>
    <html lang="pl">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="bootstrap.css">
        <title><?php echo "{$result['NAZWA']}" ?> - Corona Car</title>
    </head>

    <body>
        <!---------------------------------------------------------------------->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <script src="js/jquery.mycart.js"></script>
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
        <div class="container-fluid">
            <div class="row">
                <div class="col-4" style="margin-top: 6%; text-align: center;">
                    <img src="<?php echo "{$result['IMG_AUTO']}" ?>" class="img-thumbnail" alt="Obrazek auta" style="width: 100%; max-width: 500px"><br><br>
                    <h3><?php echo "{$result['NAZWA']}" ?></h3>
                </div>
                <div class="col-6" style="margin-top: 5%;">
                    <h2>Сharakterystyki auta:</h2>
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td><strong>Rok</strong></td>
                                <td><?php echo "{$result['ROK']}"  ?></td>
                            </tr>
                            <tr>
                                <td><strong>Przebieg</strong></td>
                                <td><?php echo "{$result['PRZEBIEG']}"  ?></td>
                            </tr>
                            <tr>
                                <td><strong>Pojemność silnika</strong></td>
                                <td><?php echo "{$result['POJEMNOSC']}"  ?></td>
                            </tr>
                            <tr>
                                <td><strong>Moc silnika</strong></td>
                                <td><?php echo "{$result['MOC']}" ?></td>
                            </tr>
                            <tr>
                                <td><strong>Cena (w dolarach)</strong></td>
                                <td><?php echo "{$result['CENA']}"  ?></td>
                            </tr> <?php } ?>
                        <tr>
                            <td><strong>Sklep</strong></td>
                            <td><a href="sklep.php?sklep_id=<?php echo "{$sklep1['ID_SKLEPU']}" ?>"><?php echo "{$sklep1['NAZWA_SKLEPU']}" ?></a></td>
                        </tr>
                        </tbody>
                    </table></br>
                    <form method="post">
                        <button class="btn btn-success" name="sumbit" type="sumbit">Kup teraz</button><br><br>
                    </form>
                    <h5>Dowiedż wiecęj o <a href="dealer.php?dealer_id=<?php echo "{$dealer1['ID_DEALERA']}" ?>">dealerze...</a></h5>
                </div>
                <div class="col-2"></div>
            </div>
        </div>


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
    oci_close($link)
    ?>