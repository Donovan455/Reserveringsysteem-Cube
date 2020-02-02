<?php
//require database in this file
require_once "includes/dbh.inc.php";

//check for click on sumbit.delete
if (isset($_POST['submitDelete'])) {
    //Delete the data from the database
    $sql = "DELETE FROM afspraken WHERE id =" . mysqli_escape_string($conn, $_POST['id']);

    mysqli_query($conn, $sql) or die ('Error: '.mysqli_error($conn));

    mysqli_close($conn);

    //back to admin page
    header ("Location: admin.php");
    exit();


} else if (isset($_POST['submit'])) {
    //check for click on submit.edit
    //postback met de data showing aan de user
    $afsprakenId    = mysqli_escape_string($conn, $_POST['id']);
    $voornaam       = mysqli_escape_string($conn, $_POST['voornaam']);
    $achternaam     = mysqli_escape_string($conn, $_POST['achternaam']);
    $email          = mysqli_escape_string($conn, $_POST['email']);
    $telefoon       = mysqli_escape_string($conn, $_POST['telefoon']);
    $datum          = mysqli_escape_string($conn, $_POST['datum']);
    $dagdeel        = mysqli_escape_string($conn, $_POST['dagdeel']);
    $mededeling     = mysqli_escape_string($conn, $_POST['mededeling']);

    //require the form validation handling
    require_once "includes/form.inc.php";

    $afspraken = [
        'voornaam'      => $voornaam,
        'achternaam'    => $achternaam,
        'email'         => $email,
        'telefoon'      => $telefoon,
        'datum'         => $datum,
        'dagdeel'       => $dagdeel,
    ];

    if (isset($errors)) {
        $sql = "UPDATE afspraken
                SET voornaam = '$voornaam', achternaam = '$achternaam', email = '$email', telefoon = '$telefoon', datum = '$datum', dagdeel = '$dagdeel'
                WHERE id = '$afsprakenId'";
        $result = mysqli_query($conn, $sql);

        if (isset($result)) {
            header('Location: admin.php');
            exit();
        }
        else {
            $errors[] = 'something went wrong in your database query: ' . mysqli_error($conn);
        }
    }
} else if (isset($_GET['id'])) {
    //else if get info what information to change or delete
    //GET parameter from the Super Global
    $afsprakenId = $_GET['id'];

    $sql = "SELECT * FROM afspraken WHERE id=" . mysqli_escape_string($conn, $afsprakenId);
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) == 1) {

        $afspraken = mysqli_fetch_assoc($result);
    }
    else {
        //if no result redirect to admin.edit
        header('Location: admin.php?results=none');
        exit();
    }
} else {
    header('Location: ../admin.php?error=cantdothatdimwit');
}

//close connection
mysqli_close($conn);
?>
<!doctype html>
<html lang="en">
    <head>
        <title>Cube Edit</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" href="css/style.css"/>
    </head>
    <body>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="data-field">
                <label for="voornaam">Voornaam</label>
                <input id="voornaam" type="text" name="voornaam" value="<?= $afspraken['voornaam'] ?>"/>
                <span class="errors"><?= isset($errors['voornaam']) ? $errors['voornaam'] : '' ?></span>
            </div>
            <div class="data-field">
                <label for="achternaam">Achternaam</label>
                <input id="achternaam" type="text" name="achternaam" value="<?= $afspraken['achternaam'] ?>"/>
                <span class="errors"><?= isset($errors['achternaam']) ? $errors['achternaam'] : '' ?></span>
            </div>
            <div class="data-field">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="<?= $afspraken['email'] ?>"/>
                <span class="errors"><?= isset($errors['email']) ? $errors['email'] : '' ?></span>
            </div>
            <div class="data-field">
                <label for="telefoon">Telefoon nummer</label>
                <input id="telefoon" type="tel" name="telefoon" value="<?= $afspraken['telefoon'] ?>"/>
                <span class="errors"><?= isset($errors['telefoon']) ? $errors['telefoon'] : '' ?></span>
            </div>
            <div class="data-field">
                <label for="datum">Datum</label>
                <input id="datum" type="date" name="datum" value="<?= $afspraken['datum'] ?>"/>
                <span class="errors"><?= isset($errors['datum']) ? $errors['datum'] : '' ?></span>
            </div>
            <?php if ($afspraken['dagdeel'] !== '') { ?>
            <div class="data-field">
                <label for="datum">Dagdeel</label>
                <select name="dagdeel" id="dagdeel">
                    <option value="<?= $afspraken['dagdeel'] ?>"><?= $afspraken['dagdeel'] ?></option>
                    <option value="Ochtend">Ochtend</option>
                    <option value="Middag">Middag</option>
                    <option value="Avond">Avond</option>
                </select>
                <span class="errors"><?= isset($errors['dagdeel']) ? $errors['dagdeel'] : '' ?></span>
            </div>
            <?php } ?>

            <div>
                <input type="hidden" name="id" value="<?= $afsprakenId ?>"/>
                <input type="submit" name="submit" value="Save"/>
                <input type="submit" name="submitDelete" value="Delete">
            </div>
        </form>
        <div>
            <a href="admin.php">Ga terug naar reseveringen</a>
        </div>
    </body>
</html>

