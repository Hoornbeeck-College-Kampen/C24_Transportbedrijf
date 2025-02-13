<?php
define('HOST', 'localhost');
define('DATABASE', 'c24_transportbedrijf');
define('USER', 'root');
define('PASSWORD', '');
$dbconn = '';

//connectie maken
try {
    $dbconn = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
}
catch (exception $e) {
    $dbconn = $e;
}

//database sluiten
function fnCloseDb($conn) {
    if (!$conn == false)
    {
        mysqli_close($conn) or die('Sluiten database niet gelukt...!');
    }
}

?>