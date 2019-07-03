
<?php
include("../php/connect_database.php");

$sql = "SELECT * FROM heroes";


$sth = $bdd->query($sql);

$data = $sth->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($data);

?>
