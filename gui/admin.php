<?php
include('php/admin2.php');
if (isset($_SESSION["name"])) {
    if ($_SESSION["id"] == 1) {
        $car2 = mysqli_query($link, $car);
        $car4 = mysqli_query($link, $car);
        $sklep2 = mysqli_query($link, $sklep);
        $dealer2 = mysqli_query($link, $dealer);
?>


        <!DOCTYPE html>
        <html lang="pl">

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link rel="stylesheet" href="bootstrap.css">


            <title>Panel Admina</title>
        </head>

        <body>
            <!---------------------------------------------------------------------->
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
            <!---------------------------------------------------------------------->
            <script>
                function submitForm() {
                    var frm = document.getElementsByName('contact-form')[0];
                    frm.submit();
                    frm.reset();
                    return false;
                }

                $(document).ready(function() {
                    $("#dodaj").click(function() {
                        $("#form1").toggle();
                    });
                });

                $(document).ready(function() {
                    $("#usun").click(function() {
                        $("#form2").toggle();
                    });
                });

                $(document).ready(function() {
                    $("#edytuj").click(function() {
                        $("#form3").toggle();
                    });
                });
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
            <div class="text-center" style="padding-top: 20px;">
                <button class="btn btn-outline-success" id="dodaj">Dodaj samochód</button>
                <button class="btn btn-outline-danger" id="usun">Usuń samochód</button>
                <button class="btn btn-outline-warning" id="edytuj">Edytuj samochód</button>
                <br>
                <div class="container-sm">
                    <form method="post" id="form1" style="display: none;">
                        <div class="form-group">
                            <label>Nazwa samochodu</label>
                            <input type="name" name="nazwa" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label>Rok samochodu (tylko cyfry)</label>
                            <input type="name" name="rok" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label>Przebieg</label>
                            <input type="name" name="przebieg" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label>Pojemność</label>
                            <input type="name" name="pojemnosc" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label>Moc</label>
                            <input type="name" name="moc" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label>Cena (tylko cyfry)</label>
                            <input type="name" name="cena" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label>ID Sklepu, w któtym stoi samochód</label><br>
                            <select name="ids" form="form1" required>
                                <option> -----Wybierz sklep-----</option>
                                <?php while ($sklep3 = mysqli_fetch_assoc($sklep2)) { ?>
                                    <option value="<?php echo $sklep3["ID_SKLEPU"]; ?>"><?php echo $sklep3["ID_SKLEPU"]; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>ID Dealera</label><br>
                            <select name="idd" form="form1" required>
                                <option> -----Wybierz dealera-----</option>
                                <?php while ($dealer3 = mysqli_fetch_assoc($dealer2)) { ?>
                                    <option value="<?php echo $dealer3["ID_DEALERA"]; ?>"><?php echo $dealer3["ID_DEALERA"]; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Ścieżka do obrazku</label>
                            <input type="name" name="obraz" class="form-control" required />
                        </div>
                        <button class="btn btn-success" type="sumbit" name="dodaj">Dodaj</button>
                    </form>
                    <br>
                    <form method="post" id="form2" style="display: none;">
                        <select name="cars" form="form2">
                            <option> -----Wybierz samochód-----</option>
                            <?php while ($car3 = mysqli_fetch_assoc($car2)) { ?>
                                <option value="<?php echo $car3["Nazwa"]; ?>"><?php echo $car3["Nazwa"]; ?></option>
                            <?php } ?>
                        </select><br><br>
                        <button class="btn btn-danger" type=sumbit name="usun">Usuń</button>
                    </form>
                    <br>
                    <form method="post" id="form3" style="display: none;">
                        <select name="updt" form="form3">
                            <label>Wybierz samochód do edytowania</label><br><br>
                            <option> -----Wybierz samochód-----</option>
                            <?php while ($car3 = mysqli_fetch_assoc($car4)) { ?>
                                <option value="<?php echo $car3["Nazwa"]; ?>"><?php echo $car3["Nazwa"]; ?></option>
                            <?php } ?>
                        </select><br><br>
                        <div class="form-group">
                            <label>Wprowadź nową cenę*</label>
                            <input type="name" name="cenanew" class="form-control" required />
                        </div>
                        <button class="btn btn-success" type="sumbit" name="edytuj">Zmień</button><br><br>
                        <p>* - w samochodzie nic nie można zmienić, kiedy nie ma właściciela, oprócz ceny.</p>
                    </form>
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
    } else {
        echo "<div class='text-center'><h2>Przepraszam, nie masz dostępu do tej strony</h2></div>";
    }
} else {
    echo "<div class='text-center'><h2>Przepraszam, nie masz dostępu do tej strony</h2></div>";
}
?>