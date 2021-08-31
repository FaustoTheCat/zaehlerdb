<?php
function db_connect()
{
$user = "mydbuser";
$passwd = "sn00zedb";
try {
    $pdo = new PDO('mysql:host=localhost;dbname=verbrauchszaehler', $user, $passwd);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Verbindung fehlgeschlagen: ' . $e->getMessage();
}
return($pdo);
}

function MkOptZaehler()
{
$pdo = db_connect();
$sql = "SELECT `id`,`Name` FROM `zaehler` order by  `Name`";
$options = '';
foreach ($pdo->query($sql) as $row)
{
    $options .= "<option value=" . $row['id'] . ">" . $row['Name'] . "</option>\n";
}
return ($options);
}

function ausgabe_uhrzeit()
{
    echo "<p>Es ist gerade: ". date("H:i:s"). "</p>";
}
?>
