<?php
if (isset($_POST['login-submit'])) {
    require 'dbh.inc.php';
    $mailuid = $_POST['useruid'];
    $password = $_POST['pwd'];
    //check if any of the fields are empty
    if (empty($mailuid) || empty($password)) {
        header("Location: ../admin.php?error=emptyfields");
        exit();
    }
    else {
        $sql = "SELECT * FROM users WHERE uidUsers=? OR emailUsers=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../admin.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $pwdCheck = password_verify($password, $row['pwdUsers']);
                if ($pwdCheck == false) {
                    header("Location: ../admin.php?error=wrongpwd");
                    exit();
                }
                else if ($pwdCheck == true) {
                    session_start();
                    $_SESSION['uidUsers'] = $row['uidUsers'];
                    header("Location: ../admin.php?login=succes");
                    exit();
                }
            }
            else {
                header("Location: ../admin.php?error=nouser");
                exit();
            }
        }
    }
} else {
    header("Location: ../admin.php");
    exit();
}



