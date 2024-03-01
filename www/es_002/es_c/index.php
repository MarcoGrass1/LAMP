<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabella dei quadrati e cubi</title>
</head>
<body>
    <?php
        if(isset($_POST['Crea_tabella'])){
            if(isset($_POST['scelta']))
            $scelta = $_POST['scelta'];
            echo '<table border=1>
                <tr>
                    <td>Numero</td>
                    <td>Quadrati</td>
                    <td>Cubo</td>
                </tr>';
            for($i=1;$i<=$scelta;$i++)
            {
                echo"<tr>
                        <td align = center>".$i."</td>
                        <td align = center>".$i*$i."</td>
                        <td align = center>".$i*$i*$i."</td>
                    </tr>";
            }
            echo '<table/>';
        }else{
            echo '<form method="POST" action="index.php">
                <p> Seleziona un numero: 
                <select name="scelta">';
                for($k=1;$k<11;$k++){
                    echo "<option>".$k."</option>\n";
                }
                echo '</select>
                    </p>
                    <br/>
                    <br/>
                    <br/>
                    <input type="submit" name="Crea_tabella"/>';
        }
    ?>
</body>
</html>