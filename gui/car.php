<?php
include('php/php.php');
$firstsql = mysqli_query($link, $sql);
while ($result = mysqli_fetch_assoc($firstsql)) {

    if (isset($_SESSION["name"])) {
        $buy = 'INSERT INTO koszyk (ID_AUTA, ID_KLIENTA, Data_zakupu, Nazwa_car) VALUES (' . $id_auta . ', ' . $_SESSION["id"] . ', "' . date("Y-m-d") . '", "' . $result['Nazwa'] . '")';
        $sell = 'UPDATE `auto` SET `Hidden` = 1 WHERE ID_AUTA = ' . $id_auta . ';';
        if (isset($_POST["sumbit"])) {
            mysqli_query($link, $buy);
            mysqli_query($link, $sell);
            
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
        <title><?php echo "{$result['Nazwa']}" ?> - Corona Car</title>
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
                    <img src="<?php echo "{$result['img_auto']}" ?>" class="img-thumbnail" alt="Obrazek auta" style="width: 100%; max-width: 500px"><br><br>
                    <h3><?php echo "{$result['Nazwa']}" ?></h3>
                </div>
                <div class="col-6" style="margin-top: 5%;">
                    <h2>Сharakterystyki auta:</h2>
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td><strong>Rok</strong></td>
                                <td><?php echo "{$result['Rok']}"  ?></td>
                            </tr>
                            <tr>
                                <td><strong>Przebieg</strong></td>
                                <td><?php echo "{$result['Przebieg']}"  ?></td>
                            </tr>
                            <tr>
                                <td><strong>Pojemność silnika</strong></td>
                                <td><?php echo "{$result['Pojemnosc']}"  ?></td>
                            </tr>
                            <tr>
                                <td><strong>Moc silnika</strong></td>
                                <td><?php echo "{$result['Moc']}" ?></td>
                            </tr>
                            <tr>
                                <td><strong>Cena (w dolarach)</strong></td>
                                <td><?php echo "{$result['Cena']}"  ?></td>
                            </tr> <?php } ?>
                        <tr>
                            <td><strong>Sklep</strong></td>
                            <td><a href="sklep.php?sklep_id=<?php echo "{$sklep1['ID_SKLEPU']}" ?>"><?php echo "{$sklep1['Nazwa_sklepu']}" ?></a></td>
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
        <footer class="footer fixed-bottom" style="height: 50px; padding: 14px">
            © 2020 Copyright:
            <a class="white" href="index.html">Corona Car</a>
        </footer>

    </body>

    </html>

    <?php
    mysqli_close($link)
    ?>