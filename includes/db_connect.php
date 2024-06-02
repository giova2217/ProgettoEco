<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $conn = new mysqli("localhost", "root", "", "progettoeco");
} catch (mysqli_sql_exception $e) {
    error_log("Connessione fallita: " . $e->getMessage());
    echo "Si &egrave; verificato un errore durante la connessione al database. Per favore riprova pi&ugrave; tardi.";
    exit();
}
?>
