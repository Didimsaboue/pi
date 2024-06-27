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
    $Demande = $_POST['Demande'];
    $Atestation = $_POST['Atestation'];
    $Photo = $_POST['Photo'];

    $sql = "INSERT INTO e_accepte (Nom, Prenom, Email, Matricule, NNI, Specialite, Attestation,Demande,Photo) VALUES ('$Nom', '$Prenom', '$Email', '$Matricule', '$NNI', '$Specialite', '$Atestation','$Demande', '$Photo')";

    if (mysqli_query($conn, $sql)) {
        header('Location: Etudiants.php?msg=Etudiant accepté avec succès');
        $sql = "DELETE FROM etudiants WHERE id=$id";
        mysqli_query($conn, $sql);
    } else {
        echo 'Erreur: ' . mysqli_error($conn);
    }
}
?>
