<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hide</title>
</head>
<body>
<style> a{border: solid black 1px; background-color:#e6e6e6; border-radius:5px;}</style>

    <?php
    session_start();

    if (!isset($_SESSION['username'])) {
        header('Location: login.php');
        exit();
    }
    $nome = $_SESSION['username'];
 
     echo "<b><h1>Benvenuto $nome <br/>Nell'area riservata del sito!</h1></b>";
    ?>
    <a href="index.php">Home</a>
    <a href="logout.php">Log Out</a>
</body>
</html>