 <!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
</head>
<body>
    <?php
    session_start();
    $logIn=<<<LOGIN
    <h1>Richiesta credenziali per l'accesso alla pagina riservata</h1>
    <p>Dati: username = marco, password=psswrd</p>   
    <form method="POST" action="login.php">
        <label for="username" type="text">Username</label>
        <input type="text" name="username" placeholder="Inserire username" required/>
        <br/>
        <br/>
        <label for="password" type="password">Password</label>
        <input type="password" name="password" placeholder="Password" required/>
        <br/>
        <br/>
        <input type="submit" name="ACCEDI"/>
    </form>
    LOGIN;
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = "marco"; 
        $password = "psswrd";
    
        if ($_POST['username'] === $username && $_POST['password'] === $password) {
            $_SESSION['username'] = $username;
            header('Location: riservata.php');
            exit();
        } else {
            echo "<p>Credenziali non valide. Riprova.</p> $logIn";
        }
    } else echo $logIn;
    ?>
    <input type="hidden" name="from" value="<?=$from?>" />
</body>
</html>