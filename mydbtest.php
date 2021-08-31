<?php
$user = "mydbuser";
$passwd = "sn00zedb";
$pdo = new PDO('mysql:host=localhost;dbname=verbrauchszaehler', $user, $passwd);
$sql = "SELECT `id`, `Name`, `Ident`, `verbrauchsart` FROM `zaehler`";
foreach ($pdo->query($sql) as $row) {
   echo  $row['id:'] . " " . $row['Name']." ".$row['Ident']."<br />";
   echo "Verbrauchsart: ".$row['verbrauchsart']."<br /><br />";
}
?>
