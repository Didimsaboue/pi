<?php
include 'db_conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $Nom = $_POST['Nom'];
    $Prenom = $_POST['Prenom'];
    $Email = $_POST['Email'];
    $Matricule = $_POST['Matricule'];
    $NNI = $_POST['NNI'];
    $Specialite = $_POST['Specialite'];
    $Atestation = $_POST['Atestation'];
    $Photo = $_POST['Photo'];

    $sql = "INSERT INTO e_refuse (Nom, Prenom, Email, Matricule, NNI, Specialite, Attestation,Photo) VALUES ( '$Nom', '$Prenom', '$Email', '$Matricule', '$NNI', '$Specialite', '$Atestation' , '$Photo' )";

    if (mysqli_query($conn, $sql)) {
        header('Location: Etudiants.php?msg=Etudiant refusé avec succès');
        $sql = "DELETE FROM etudiants WHERE id=$id";
        mysqli_query($conn, $sql);
    } else {
        echo 'Erreur: ' . mysqli_error($conn);
    }
}
?>
