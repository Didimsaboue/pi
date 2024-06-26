<?php
include "db_conn.php";

if (isset($_POST["submit"])) {
   $Nom = $_POST['Nom'];
   $Prenom = $_POST['Prenom'];
   $Email = $_POST['Email'];
   $Matricule = $_POST['Matricule'];
   $NNI = $_POST['NNI'];
   $Tel = $_POST['Tel'];
   $Specialite = $_POST['Specialite'];
   $password = $_POST['password'];

   $sql = "INSERT INTO `Etudiants`(`id`, `Nom`, `Prenom`, `Email`, `Matricule`,`NNI`,`Tel`,`Specialite`,`password`) 
        VALUES (NULL,'$Nom','$Prenom','$Email','$Matricule','$NNI','$Tel','$Specialite','$password')";


   $result = mysqli_query($conn, $sql);

   if ($result) {
      header("Location: Etudiants.php?msg=Nouvel enregistrement créé avec succès");
   } else {
      echo "Failed: " . mysqli_error($conn);
   }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!-- Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <title>ADD</title>
</head>

<body>
   <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
      Ajouter un etudiant dans Bourssi
   </nav>

   <div class="container">
      <div class="text-center mb-4">
         <h3>Ajouter un nouveau</h3>
         <p class="text-muted">Remplissez le formulaire ci-dessous pour ajouter un nouvel utilisateur</p>
      </div>

      <div class="container d-flex justify-content-center">
         <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="row mb-3">
               <div class="col">
                  <label class="form-label">Nom:</label>
                  <input type="text" class="form-control" name="Nom" placeholder="Ahmed">
               </div>

               <div class="col">
                  <label class="form-label">Prenom:</label>
                  <input type="text" class="form-control" name="Prenom" placeholder="Mouhssin">
               </div>
            </div>

            <div class="mb-3">
               <label class="form-label">Email:</label>
               <input type="email" class="form-control" name="Email" placeholder="nom@example.com">
            </div>
            <div class="mb-3">
               <label class="form-label">Matricule:</label>
               <input type="texte" class="form-control" name="Matricule" placeholder="Entrer votre matricule">
            </div>
            <div class="mb-3">
               <label class="form-label">NNI:</label>
               <input type="number" class="form-control" name="NNI" placeholder="Entrer votre NNI">
            </div>
            <div class="mb-3">
               <label class="form-label">Telephone </label>
               <input type="tel" class="form-control" name="Tel" placeholder="Entrer votre numero du telephone">
            </div>
            <div class="mb-3">
               <label class="form-label">Specialite</label>
               <input type="text" class="form-control" name="Specialite" placeholder="Entrer votre specialite">
            </div>
            <div class="mb-3">
               <label class="form-label">Password</label>
               <input type="password" class="form-control" name="password" placeholder="Entrer Votre mot de passe">
            </div>

            

            <div>
               <button type="submit" class="btn btn-success" name="submit">Sauvegarder</button>
               <a href="Etudiants.php" class="btn btn-danger">Annuler</a>
            </div>
         </form>
      </div>
   </div>

   <!-- Bootstrap -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>