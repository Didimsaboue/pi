<?php
include "db_conn.php";
$id = $_GET["id"];
$sql = "DELETE FROM `Etudiants` WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location: Etudiants.php?msg=Données supprimées avec succès");
} else {
  echo "Failed: " . mysqli_error($conn);
}
?>
