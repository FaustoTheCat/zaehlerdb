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

function GenCounterTable($id)
{
  $pdo = db_connect();
  $sql = "SELECT `ablesedatum`,`wert`,\n"
    . "       `wert` - (SELECT `wert`     \n"
    . "                       FROM     `v_ablesungen` AS d1\n"
    . "                       WHERE  d1.`ablesedatum` < d0.`ablesedatum`\n"
    . "                       AND `id` = " . $id ." \n"
    . "                       ORDER  BY `ablesedatum` DESC   LIMIT 1\n"
    . "                     ) AS Zaehlerstand_diff      \n"
    . "FROM   `v_ablesungen` AS d0 WHERE `id` = " . $id ." \n"
    . "ORDER  BY 1, 2";
?>

    <table border="1" cellpadding=12 rules="all" id="meineTabelle" data-role="table" class="ui-responsive"
           data-mode="columntoggle" data-column-btn-text="Spalten" >
      <thead>
        <tr>
          <th data-priority="4">Datum</th>
          <th>Wert</th>
          <th data-priority="1">Differenz</th>
        </tr>
      </thead>
      <tbody>
    <?php
    foreach ($pdo->query($sql) as $row) {
    ?>
        <tr>
            <td>
                <?php echo $row['ablesedatum']; ?>
            </td>
            <td>
                <?php echo $row['wert']; ?>
            </td>
            <td>
                <?php echo $row['Zaehlerstand_diff']; ?>
            </td>

      </tr>
    <?php
    }
    ?>
      </tbody>
    </table>
<?php
}

function ausgabe_uhrzeit()
{
    echo "<p>Es ist gerade: ". date("DD:MM:YYY H:i:s"). "</p>";
}
?>
