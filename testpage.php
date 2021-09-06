<!DOCTYPE html>

<?php
include "dbtools.php";
// Formular reaktion:
//print_r($_GET);
if (isset( $_GET['zaehler'] ) )
{
$zaehler = htmlspecialchars( $_GET['zaehler']);
// Tabelle mit werten des Zählers ausgeben
GenCounterTable($zaehler);
}

?>

<html lang=de>
<head>
  <meta charset="UTF-8">
  <title>Formular</title>
<style type="text/css">
<!--
input.error {
    background-color: red;
}
-->
</style>
</head>

<body>
Hier soll eine Optionsbox erscheinen, also bald<BR>
<form action=""<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "get">
	<label>Zähler:
		<select name="zaehler">
<?php
$options = MkOptZaehler();
echo "$options";
?>
		</select>
	</label>
  <button type="submit">Eingaben absenden</button>
</form>
<?php
ausgabe_uhrzeit();
?>
</body>
</html>
