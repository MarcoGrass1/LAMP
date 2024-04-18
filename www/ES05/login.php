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

echo "Connessione al database riuscita<br>";
// Recupera le credenziali dalla richiesta POST
$email = "mrossi"; //$_POST['email'];
$password = "1ff23"; //$_POST['password'];

// Esegui la query per verificare le credenziali dell'utente
$query = "SELECT * FROM utente WHERE Username = '$email' AND Password = '$password';";
echo $query."<br";

try {
    $result = mysqli_query($conn, $query);
    // Verifica se la query ha restituito risultati

    echo "ciao<br>";
    if (mysqli_num_rows($result) > 0) {
        echo "Login riuscito. Benvenuto!"; // L'utente è autenticato con successo
    } else {
        echo "Credenziali non valide. Riprova."; // L'utente non è autenticato
    }
} catch (Exception $e) {
    echo "Errore: " . $e;
}



// Chiudere la connessione quando non è più necessaria
mysqli_close($conn);
?>
