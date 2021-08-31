<?php
function db_connect()
{
$user = "mydbuser";
$passwd = "sn00zedb";
$pdo = new PDO('mysql:host=localhost;dbname=verbrauchszaehler', $user, $passwd);
}

function MkOptZaehler()
{
$sql = "SELECT `id`,`Name` FROM `zaehler` order by  `Name`";
$options = '';
foreach ($pdo->query($sql) as $row)
{
    $options .= "<option value=" . $row['id'] . ">" . $row['name'] . "</option>\n";
return ($options);
}
}

function ausgabe_uhrzeit()
{
    echo "<p>Es ist gerade: ". date("H:i:s"). "</p>";
}
?>
