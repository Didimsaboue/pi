<?php
include "db_conn.php";
$id = $_GET["id"];

if (isset($_POST["submit"])) {
  $Nom = $_POST['Nom'];
  $Prenom = $_POST['Prenom'];
  $email = $_POST['Email'];
  $matricule = $_POST['Matricule'];
  $NNI = $_POST['NNI'];
  $Tel = $_POST['Tel'];
  $specialite = $_POST['Specialite'];
  $password = $_POST['password'];

  $sql = "UPDATE `Etudiants` SET `Nom`='$Nom', `Prenom`='$Prenom', `Email`='$email', `Matricule`='$matricule', `NNI`='$NNI', `Tel`='$Tel', `Specialite`='$specialite', `password`='$password' WHERE id = $id";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: Etudiants.php?msg=Données mises à jour avec succès");
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

  <title>Modifier</title>
</head>

<body>
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
    MANAGEUR D'ETUDIANTS
  </nav>

  <div class="container">
    <div class="text-center mb-4">
      <h3>Modifier les informations d'eleves</h3>
      <p class="text-muted">Cliquez sur mettre à jour après avoir modifié des informations</p>
    </div>

    <?php
$sql = "SELECT * FROM `Etudiants` WHERE id = $id LIMIT 1";
$result = mysqli_query($conn, $sql);

if (!$result) {
    // Query failed, handle the error
    echo "Échec de la récupération des données : " . mysqli_error($conn);
} else {
    // Check if a row was returned
    if (mysqli_num_rows($result) > 0) {
        // Fetch the row as an associative array
        $row = mysqli_fetch_assoc($result);
        // Use $row as needed
    } else {
        // No rows found
        echo "Aucun enregistrement trouvé avec ID : $id";
    }
}

// Don't forget to free the result set
mysqli_free_result($result);
?>


    <div class="container d-flex justify-content-center">
      <form action="" method="post" style="width:50vw; min-width:300px;">
        <div class="row mb-3">
          <div class="col">
            <label class="form-label">Nom:</label>
            <input type="text" class="form-control" name="Nom" value="<?php echo $row['Nom'] ?>">
          </div>

          <div class="col">
            <label class="form-label">Prenom:</label>
            <input type="text" class="form-control" name="Prenom" value="<?php echo $row['Prenom'] ?>">
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label">Email:</label>
          <input type="email" class="form-control" name="Email" value="<?php echo $row['Email'] ?>">
        </div>
        <div class="mb-3">
          <label class="form-label">Matricule:</label>
          <input type="text" class="form-control" name="Matricule" value="<?php echo $row['Matricule'] ?>">
        </div>
        <div class="mb-3">
          <label class="form-label">NNI:</label>
          <input type="number" class="form-control" name="NNI" value="<?php echo $row['NNI'] ?>">
        </div>
        <div class="mb-3">
          <label class="form-label">Telephone:</label>
          <input type="tel" class="form-control" name="Tel" value="<?php echo $row['Tel'] ?>">
        </div>
        <div class="mb-3">
          <label class="form-label">Specialite:</label>
          <input type="text" class="form-control" name="Specialite" value="<?php echo $row['Specialite'] ?>">
        </div>
        <div class="mb-3">
          <label class="form-label">password:</label>
          <input type="password" class="form-control" name="password" value="<?php echo $row['password'] ?>">
        </div>

       

        <div>
          <button type="submit" class="btn btn-success" name="submit">Modifier</button>
          <a href="index.php" class="btn btn-danger">Annuler</a>
        </div>
      </form>
    </div>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>
