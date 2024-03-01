
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
</head>
<body>
    <?php

    if (isset($_POST['invio'])){
        if(isset($_POST['nome']))
            $nome = $_POST['nome'];
        if(isset($_POST['password']))
            $pwd = $_POST["password"];
        if($nome!="marco" || $pwd!='psswrd'){
            echo'<h4>Attenzione! Nome utente o password sbagliate</h4>
                <h1>Accesso alla pagina riservata</h1>
                <p>Dati: nome = marco, password = psswrd</p>
                <form method="POST" action="index.php">
                <label for="nome" type="text">Username </label>
                <input type="text" name="nome" placeholder="Inserire nome utente"/>
                <br/>
                <br/>
                <label for="password" type="password">Password </label>
                <input type="password" name="password" placeholder="Password"/>
                <br/>
                <br/>
                <input type="submit" name="invio"/>';
        } else{
            echo "<h4>Benvenuto $nome <br/>Nell'area riservata del sito!</h4>";
        }

    } else{
        echo'<h1>Accesso alla pagina riservata</h1>
                <p>Dati: nome = marco, password = psswrd</p>
                <form method="POST" action="index.php">
                <label for="nome" type="text">Username </label>
                <input type="text" name="nome" placeholder="Inserire nome utente"/>
                <br/>
                <br/>
                <label for="password" type="password">Password </label>
                <input type="password" name="password" placeholder="Password"/>
                <br/>
                <br/>
                <input type="submit" name="invio"/>';
    }

    ?>
  
</body>
</html>