<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/owl.carousel.min.css">

  <link rel="stylesheet" href="css/bootstrap.min.css">

  <link rel="stylesheet" href="css/style.css">

  <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.3/components/registrations/registration-7/assets/css/registration-7.css">
  <title>Inscription</title>

  <!-- Autres balises head... -->
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>


</head>

<body>
  <section class="bg-light p-3 p-md-4 p-xl-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6 col-xxl-5">
          <div class="card border border-light-subtle rounded-4">
            <div class="card-body p-3 p-md-4 p-xl-5">
              <div class="row">
                <div class="col-12">
                  <div class="mb-5">
                    <div class="text-center mb-4">
                      <a href="#!">
                        <img src="Cnou.jpeg" alt="Supnum Logo" width="60" height="57">
                      </a>
                    </div>
                    <h2 class="h4 text-center">Inscription</h2>
                    <h3 class="fs-6 fw-normal text-secondary text-center m-0">Entrez vos coordonnées pour vous inscrire</h3>
                  </div>
                </div>
              </div>
              <form action="#" method="post">
                <div class="row gy-3 overflow-hidden">
                  <div class="col-12">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" name="Nom" id="firstName" placeholder="First Name" required>
                      <label for="firstName" class="form-label">Prénom</label>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" name="Prenom" id="lastName" placeholder="Last Name" required>
                      <label for="lastName" class="form-label">Nom</label>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-floating mb-3">
                      <input type="number" class="form-control" name="Matricule" id="matricule" placeholder="Matricule" required>
                      <label for="matricule" class="form-label">Matricule</label>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-floating mb-3">
                      <input type="email" class="form-control" name="Email" id="email" placeholder="name@example.com" required>
                      <label for="email" class="form-label">Email</label>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-floating mb-3">
                      <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                      <label for="password" class="form-label">Mot de passe</label>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-floating mb-3">
                      <input type="password" class="form-control" name="password2" id="confirmPassword" placeholder="Password" required>
                      <label for="confirmPassword" class="form-label">Confirmer Mot de passe</label>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="d-grid">
                      <button class="btn bsb-btn-xl" type="submit" name="bt" style="background-color: #0CEF89;">S'inscrire</button>
                    </div>
                  </div>
                </div>
              </form>
              <div class="row">
                <div class="col-12">
                  <hr class="mt-5 mb-4 border-secondary-subtle">
                  <p class="m-0 text-secondary text-center">Vous avez déjà un compte? <a href="Pratique sur form.php" class="link-success text-decoration-none">Se connecter</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="bootstrap.bundle.min.js"></script>

  <?php

  include("db_conn.php");

  // Récupération des données du formulaire
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['Nom'];
    $prenom = $_POST['Prenom'];
    $email = $_POST['Email'];
    $matricule = $_POST['Matricule'];
    $password = $_POST['password'];

    if ($password == $_POST['password2']) {
      // Requête SQL pour insérer les données dans la base de données
      $sql = "INSERT INTO etudiants (Nom, Prenom, Matricule, Email, password) VALUES ('$nom', '$prenom', '$matricule', '$email', '$password')";

      // Exécuter la requête SQL
      if ($conn->query($sql) === TRUE) {
        echo "<script>
                Toastify({
                    text: 'Inscription réussie!',
                    duration: 3000,
                    gravity: 'top',
                    position: 'right',
                    backgroundColor: '#4CAF50',
                    stopOnFocus: true,
                }).showToast();
              </script>";
      } else {
        echo "Erreur lors de l'inscription : " . $conn->error;
      }
    } else {
      echo "<script>
            Toastify({
                text: 'Les mots de passe ne correspondent pas!',
                duration: 3000,
                gravity: 'top',
                position: 'right',
                backgroundColor: '#FF0000',
                stopOnFocus: true,
            }).showToast();
          </script>";
    }
  }
  ?>

</body>

</html>
