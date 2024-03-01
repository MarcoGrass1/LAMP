<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hide</title>
</head>
<body>
    <h1>Verifica dati inseriti</h1>

    <?php
    $nome = $_GET['nome'];
    $pwd = $_GET["password"];

    echo "Dati inseriti:<br/>\n";
    echo "nome = $nome<br/>\n";
    echo "password = $pwd<br/>\n";
    echo "<br/><br/>\n";

    if($nome!="marco" || $pwd!='psswrd')
    {
        echo "<h4>Attenzione! Nome utente o password sbagliate</h4>";
    }
    else
    {
        echo "<h4>Benvenuto $nome <br/>Nell'area riservata del sito!</h4>";
    }
    ?>
</body>
</html>