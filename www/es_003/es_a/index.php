<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validazione</title>
</head>
<body>
<form method="POST" action="index.php">
        <label for="nome" type="text">Nome</label>
        <input type="text" name="nome" placeholder = "Inserenome utente" required pattern="[A-Za-z\s]+"/>
        <br/>
        <br/>
        <label for="cognome" type="text">Cognome</label>
        <input type="text" name="cognome" placeholder = "cognome" required pattern="[A-Za-z\s']+"/>
        <br/>
        <br/>
        <label for="data_nascita" type="text">Data di nascita</label>
        <input type="date" name="data_nascita" placeholder = "data di nascita" required/>
        <br/>
        <br/>
        <label for="codice_fiscale" type="text">Codice fiscale</label>
        <input type="text" name="codice_fiscale" placeholder = "Codice Fiscale" pattern="/^[A-Z]{6}\d{2}[A-Z]\d{2}[A-Z]\d{3}[A-Z]$/"/>
        <br/>
        <br/>
        <label for="email" type="text"> Email </label>
        <input type="email" name="email" placeholder = "Email" required/>
        <br/>
        <br/>
        <label for="NoCell" type="text">Numero Cellulare</label>
        <input type="tel" name="NoCell" placeholder = "N° Cell" pattern="[0-9]{12}"/>
        <br/>
        <br/>
        <label>Via/Piazza</label>
        <input type="text" name="indirizzo_via" required>
        <br/>
        <br/>
        <label>Cap </label>
        <input type="text" name="indirizzo_cap" required>
        <br/>
        <br/>
        <label>Comune</label>
        <input type="text" name="indirizzo_comune" required>
        <br/><br/>
        <label>Provincia </label>
        <input type="text" name="indirizzo_provincia" required>
        <br/>
        <br/>
        <label for="nickname" type="text">Nickname</label>
        <input type="text" name="nickname" placeholder = "nickname" required/>
        <br/>
        <br/>
        <label for="password" type="password">Password</label>
        <input type="password" name="password" placeholder = "Password" required  pattern="^(?=.*\d)(?=.*[A-Z])(?=.*\W).{8,}$"/>
        <br/>
        <br/>
        <input type="submit" name="invia"/>
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nome = trim($_POST["nome"]);
            $cognome = trim($_POST["cognome"]);
            $data_nascita = $_POST["data_nascita"];
            $codiceFiscale = (isset($_POST["codice_fiscale"])) ? trim($_POST["codice_fiscale"]) : ' ';
            $email = trim($_POST["email"]);
            $cellulare = $_POST["NoCell"];
            $indirizzoVia = trim($_POST["indirizzo_via"]);
            $indirizzoCap = trim($_POST["indirizzo_cap"]);
            $indirizzoComune = trim($_POST["indirizzo_comune"]);
            $indirizzoProvincia = trim($_POST["indirizzo_provincia"]);
            $nickname = trim($_POST["nickname"]);
            $password = $_POST["password"];


            if (!preg_match('/^[A-Za-z ]+$/', $nome)) {
                $errors[] = "Nome non valido";
            }

            if (!preg_match('/^[A-Za-z \'&]+$/', $cognome)) {
                $errors[] = "Cognome non valido";
            }

            if (empty($data_nascita)) {
                $errors[] = "Inserisci la data di nascita";
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Email non valida";
            }

            if (!empty($cellulare) && !preg_match('/^[0-9]{12}$/', $cellulare)) {
                $errors[] = "Cellulare non valido";
            }

            if ($nickname === $nome || $nickname === $cognome) {
                $errors[] = "Nickname deve essere diverso da Nome e Cognome";
            }

            if (strlen($password) < 8 || !preg_match('/[A-Z]+/', $password) || !preg_match('/[0-9]+/', $password) || !preg_match('/[^A-Za-z0-9]+/', $password)) {
                $errors[] = "Password non valida";
            }

            if (empty($errors)) {
                echo "Dati inseriti correttamente:";
                echo "<br>Nome:" . htmlspecialchars($nome);
                echo "<br>Cognome:".htmlspecialchars($cognome);
                echo "<br>Data di Nascita:".htmlspecialchars($data_nascita);
                echo "<br>Codice Fiscale:".htmlspecialchars($codiceFiscale);
                echo "<br>Email:".htmlspecialchars($email);
                echo "<br>Cellulare:".htmlspecialchars($cellulare);
                echo "<br>Indirizzo:".htmlspecialchars($indirizzoVia).",".htmlspecialchars($indirizzoCap).",".htmlspecialchars($indirizzoComune).",".htmlspecialchars($indirizzoProvincia);
                echo "<br>Nickname:".htmlspecialchars($nickname);
            } else {
                echo "Ci sono errori nei dati inseriti:";
                echo "<ul>";
                foreach ($errors as $error) {
                    echo "<li style='color: red;'>".htmlspecialchars($error)."</li>";
                }
                echo "</ul>";
            }
        }

    ?>
</body>
</html>