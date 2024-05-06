<?php
session_start();
if (!isset($_SESSION['etudiant'])) {
    header('location: Pratique sur form.php');
}
$etudiant = $_SESSION['etudiant'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bourssi</title>

</head>
<body>
    beinvennu <b><?=$etudiant['Nom']?></b>
    <h1><a href="deconnexion.php">deconnecter</a></h1>
</body>
</html>