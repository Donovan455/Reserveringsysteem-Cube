<?php
    include_once 'includes/dbh.inc.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cube Vastgoed</title>
    <link href="css/styles.css" type="text/css" rel="stylesheet">

</head>

    <body>
        <header>
            <nav>
                <a href="#">
                    <img src="images/logo-cube.png" alt="logo">
                </a>
                <div>
                    <?php if (!isset($_SESSION['uidUsers'])) { ?>
                    <form action="includes/login.inc.php" method="POST">
                        <label>
                            <input type="text" name="useruid" placeholder="Username/E-mail...">
                        </label>
                        <label>
                            <input type="password" name="pwd" placeholder="Password...">
                        </label>
                        <button type="submit" name="login-submit">Login</button>
                    </form>
                    <?php }
                    else { ?>
                    <form action="includes/logout.inc.php" method="POST">
                        <button type="submit" name="logout-submit">Logout</button>
                    </form>
                        <a href="signup.php">Make a new account</a>
                    <?php } ?>
                </div>
            </nav>
        </header>

        <main>
            <div>
                <?php
                if (isset($_SESSION['uidUsers'])) { ?>
                    <?= 'Welkom '. $_SESSION['uidUsers'] ?>
                    <section>
                        <div class="titel">
                            <div class="titelk">
                                <h1>Kantoren/Bedrijfs ruimtes</h1>
                            </div>
                            <div class="titelw">
                                <h1>Werkplek</h1>
                            </div>
                        </div>
                        <div class="grid">
                            <div class="tabelk">
                                <?php
                                //1 Show data from Database
                                $sql = "SELECT * FROM afspraken
                                        WHERE keuze='Bedrijfs ruimte' OR keuze='Kantoor'
                                        ORDER BY datum;";
                                $result = mysqli_query($conn, $sql);
                                $resultCheck = mysqli_num_rows($result);
                                if ($resultCheck > 0) { ?>
                                    <table>
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Datum</th>
                                            <th>Voornaam</th>
                                            <th>Achternaam</th>
                                            <th>Email</th>
                                            <th>Telefoon</th>
                                            <th>Ruimte</th>
                                            <th>Opmerking</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $x= 1;
                                        while ($row = mysqli_fetch_assoc($result)) { ?>
                                            <tr>
                                                <td><?= $x++ ?></td>
                                                <td><?= $row['datum']  ?></td>
                                                <td><?= htmlentities($row['voornaam']) ?></td>
                                                <td><?= htmlentities($row['achternaam']) ?></td>
                                                <td><?= htmlentities($row['email'])  ?></td>
                                                <td><?= htmlentities('0'. $row['telefoon'])?></td>
                                                <td><?= $row['keuze']  ?></td>
                                                <td><?= htmlentities($row['mededeling']);  ?></td>
                                                <td><a href="admin.edit.php?id=<?= $row['id'] ?>">Edit</a></td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                <?php } ?>
                            </div>
                            <div class="tabelw">
                                <?php
                                //1 Show data from Database Werkplek
                                $sql = "SELECT * FROM afspraken
                                        WHERE keuze='Werkplek'
                                        ORDER BY datum;";

                                $result = mysqli_query($conn, $sql);
                                $resultCheck = mysqli_num_rows($result);

                                if ($resultCheck > 0) { ?>

                                    <table>
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Datum</th>
                                            <th>Dagdeel</th>
                                            <th>Voornaam</th>
                                            <th>Achternaam</th>
                                            <th>Email</th>
                                            <th>Telefoon</th>
                                            <th>Opmerking</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $x= 1;
                                        while ($row = mysqli_fetch_assoc($result)) { ?>
                                            <tr>
                                                <td><?= $x++ ?></td>
                                                <td><?= $row['datum']  ?></td>
                                                <td><?= $row['dagdeel']  ?></td>
                                                <td><?= $row['voornaam'] ?></td>
                                                <td><?= $row['achternaam'] ?></td>
                                                <td><?= $row['email']  ?></td>
                                                <td><?= '0'. $row['telefoon']  ?></td>
                                                <td><?= $row['mededeling'];  ?></td>
                                                <td><a href="admin.edit.php?id=<?= $row['id'] ?>">Edit</a></td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                <?php } ?>
                            </div>
                        </div>
                    </section>
                <?php }
                else {
                    echo '<p>You are logged out</p>'; ?>
                <?php } ?>
            </div>
        </main>
    </body>
</html>