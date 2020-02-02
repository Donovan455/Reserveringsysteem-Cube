<?php
include_once 'includes/dbh.inc.php';
session_start();

//check of er een keuze(ruimte) is gemaakt
if (isset($_GET['keuze'])) {
    $keuze = mysqli_real_escape_string($conn, $_GET['keuze']);
}
//check of er op submit is geklikt
if (isset($_POST['submit'])) {

    //geeft alles in de form een variable
    $voornaam       = mysqli_real_escape_string($conn, $_POST['voornaam']);
    $achternaam     = mysqli_real_escape_string($conn, $_POST['achternaam']);
    $email          = mysqli_real_escape_string($conn, $_POST['email']);
    $telefoon       = mysqli_real_escape_string($conn, $_POST['telefoon']);
    $datum          = mysqli_real_escape_string($conn, $_POST['datum']);
    $mededeling     = mysqli_real_escape_string($conn, $_POST['mededeling']);
    $dagdeel        = '';

    //require the form validation handling
    require_once "includes/form.inc.php";

    // only do when keuze is werkplek
    if ($keuze == 'Werkplek') {
        $dagdeel = mysqli_real_escape_string($conn, $_POST['dagdeel']);
        if ($dagdeel == '') {
            $errors[] = 'Dagdeel mag niet leeg zijn.';
        }
    }

    // pushed de form naar de database als er geen errors zijn
    if (empty($errors)) {
        $sql = "INSERT INTO afspraken (voornaam, achternaam, email, telefoon, keuze, datum, dagdeel, mededeling)
                VALUES ('$voornaam', '$achternaam', '$email', '$telefoon', '$keuze', '$datum', '$dagdeel', '$mededeling');";
        mysqli_query($conn, $sql);
    }
}

mysqli_close($conn)

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cube Vastgoed</title>
        <link href="css/style.css" type="text/css" rel="stylesheet">
    </head>

    <?php
    if (isset($_POST['submit'])) {
        if (empty($errors)) { ?>
            <script>
                alert("Reservering succesvol");
            </script>
            <?php
            header("Location: email.php");
        }
    } ?>

    <body>
        <header>
            <div class="header">
                <img class="header_img" src="images/header.jpg" alt="">
                <img class="logo" src="images/logo-cube.png" alt="">
                <div class="centered">Vastgoed</div>
<!--                <div class="centered2">Kleinschalige kantoorunits te huur, gelegen in een zeer verzorgd verzamelgebouw aan de Ludolf de jonghstraat 41, Overschie in Rotterdam</div>-->

        </header>

        <main>
            <section>
                <?php if(isset($errors)) { ?>

                    <ul class="errors">
                        <?php foreach ($errors as $error) { ?>
                            <li><?= $error ?></li>
                        <?php } ?>
                    </ul>
                <?php }

                if (!isset($keuze)) { ?>

                    <div>
                        <form action="" method="GET">
                            <button class="button1" type="submit" name="keuze" value="Kantoor">Kantoor huren</button>
                            <button class="button1" type="submit" name="keuze" value="Bedrijfs Ruimte">Opslag/Bedrijfs ruimte huren</button>
                            <button class="button1" type="submit" name="keuze" value="Werkplek">Werkplek reserveren</button>
                        </form>
                    </div>

                <?php }

                if (isset($keuze)) { ?>
                    <div>
                        <form action="" method="POST">
                            <h1><?= $keuze ?></h1>
                            <div>
                                <div>
                                    <label for="voornaam">Voornaam</label>
                                    <input type="text" name="voornaam" placeholder="Voornaam">
                                </div>
                                <div>
                                    <label for="achternaam">Achternaam</label>
                                    <input type="text" name="achternaam" placeholder="Achternaam">
                                </div>
                                <div>
                                    <label for="email">Email</label>
                                    <input type="email" name="email" placeholder="Email" required>
                                </div>
                                <div>
                                    <label for="telefoon">Telefoon nummer</label>
                                    <input type="tel" name="telefoon" placeholder="0612345678">
                                </div>
                                <div>
                                    <label for="date">Datum</label>
                                    <input type="date" name="datum">
                                </div>
                            </div>
                            <?php if ($keuze == 'Werkplek') { ?>
                                <div>
                                    <div>
                                        <label for="time">Dagdeel</label>
                                        <select name="dagdeel">
                                            <option value="">Kies een dagdeel</option>
                                            <option value="Ochtend">Ochtend</option>
                                            <option value="Middag">Middag</option>
                                            <option value="Avond">Avond</option>
                                        </select>
                                    </div>
                                </div>
                            <?php } ?>
                            <div>
                                <div>
                                    <label for="text">Opmerking</label>
                                    <textarea name="mededeling" style="height:50px" placeholder="opmerking"></textarea>
                                </div>
                            </div>
                            <div>
                                <button class="submit" type="submit" name="submit" value="submit"> verzenden </button>
                            </div>
                        </form>
                    </div>
                <?php } ?>
            </section>
        </main>
    </body>
</html>