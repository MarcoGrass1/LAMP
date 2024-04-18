<?php
// Costanti per la connessione al database
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'ES05_user');
define('DB_PASSWORD', 'mia_password');
define('DB_NAME', 'ES05');

// Connessione al database
try {
    $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
} catch (Exception $e) {
    echo "Connessione fallita: " . mysqli_connect_error();
}

echo "Connessione al database riuscita";
// ... Puoi eseguire le tue query qui ...

// Chiudere la connessione quando non è più necessaria
mysqli_close($conn);
?>
