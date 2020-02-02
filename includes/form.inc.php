<?php
//check voor errors
$errors = [];
if ($voornaam == '') {
    $errors[] = 'Voornaam mag niet leeg zijn.';
}
if ($achternaam == '') {
    $errors[] = 'Achternaam mag niet leeg zijn.';
}
if ($email == '') {
    $errors[] = 'Email mag niet leeg zijn.';
}
if ($telefoon == '') {
    $errors[] = 'Telefoon mag niet leeg zijn.';
}
if ($datum == '') {
    $errors[] = 'Datum mag niet leeg zijn.';
}