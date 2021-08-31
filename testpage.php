<html>
<head>
<style type="text/css">
<!--
input.error {
    background-color: red;
}
-->
</style>
</head>
<?php
include "dbtools.php";

?>
<body>
Hier soll eine Optionsbox erscheinen, also bald<BR>
<form action="#">
	<label>Zähler:
		<select name="zaehler">
<?php
$options = MkOptZaehler();
echo "$options";
?>
		</select>
	</label>
</form>
<?php
ausgabe_uhrzeit();
?>
</body>
</html>
