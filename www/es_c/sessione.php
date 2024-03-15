<?php 
function login(){
    session_start();
    $logIn=<<<LOGIN
    <h1>Richiesta credenziali per l'accesso alla pagina riservata</h1>
    <p>Dati: username = marco, password=psswrd</p>   
    <form method="POST" action="login.php">
        <label for="email" type="text">email</label>
        <input type="email" name="email" placeholder="Inserire email" required/>
        <br/>
        <br/>
        <label for="password" type="password">Password</label>
        <input type="password" name="password" placeholder="Password" required/>
        <br/>
        <br/>
        <input type="submit" name="ACCEDI"/>
    </form>
    LOGIN;
    $conn=connect_db();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Recupera le credenziali dalla richiesta POST
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Esegui la query per verificare le credenziali dell'utente
        $query = "SELECT * FROM utenti WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($conn, $query);

        // Verifica se la query ha restituito risultati
        if (mysqli_num_rows($result) > 0) {
             // Chiudi la connessione al database
            mysqli_close($conn);
            header('Location: riservata.php');
            exit();
        } else {
            echo "<p>Credenziali non valide. Riprova.</p> $logIn";
        }

       

    } else echo $logIn;
}

function logout(){
    session_start();   
    session_destroy(); 
    header('Location: login.php');
    exit();
}
function riservata(){
    session_start();

    if (!isset($_SESSION['email'])) {
        $url = 'login.php?error=Fare prima il login&from=';
        $url .= basename($_SERVER['PHP_SELF']);
        header("Location: $url");
        exit();
    }
    $nome = $_SESSION['email'];
 
     echo "<b><h4>Benvenuto $nome <br/>Nell'area riservata del sito!</h4></b>";
}

function connect_db(){
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'db_user');
    define('DB_PASSWORD', 'db_pwd');
    define('DB_NAME', 'nome_database');

    // Connessione al database
    $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    // Verifica della connessione
    if (!$conn) {
        die("Connessione fallita: " . mysqli_connect_error());
    }
    return $conn;
}

?>