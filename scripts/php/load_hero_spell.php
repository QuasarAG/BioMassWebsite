
<?php
include("../php/connect_database.php");

$sth = $bdd->query("SELECT * FROM spells_hero");


$data = $sth->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($data);
 
?>
