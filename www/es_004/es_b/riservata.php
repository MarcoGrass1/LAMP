<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hide</title>
</head>
<body>
    <style> a{border: solid black 1px; background-color:#e6e6e6; border-radius:5px;}</style>
    <h1>Verifica dati inseriti</h1>

    <?php
    session_start();

    if (!isset($_SESSION['username'])) {
        $url = 'login.php?error=Fare prima il login&from=';
        $url .= basename($_SERVER['PHP_SELF']);
        header("Location: $url");
        exit();
    }
    $nome = $_SESSION['username'];
 
     echo "<b><h4>Benvenuto $nome <br/>Nell'area riservata del sito!</h4></b>";
    ?>
    <p><a href="index.php">Home</a></p><br/>
    <p><a href="logout.php">Log Out</a></p>
 
</body>
</html>