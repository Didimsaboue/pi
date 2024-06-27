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
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
  <title>Inscription</title>
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
                      <input type="text" class="form-control" name="NNI" id="NNI" placeholder="NNI" required>
                      <label for="NNI" class="form-label">NNI</label>
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
                  <p class="m-0 text-secondary text-center">Vous avez déjà un compte? <a href="Login.php" class="link-success text-decoration-none">Se connecter</a></p>
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
  $server = "localhost";
  $username = "root";
  $password = "";
  $db = "Bourssi";

  $conn = new mysqli($server, $username, $password, $db);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['Nom'];
    $prenom = $_POST['Prenom'];
    $email = $_POST['Email'];
    $matricule = $_POST['NNI'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['password2'];

    if ($password === $confirmPassword) {
        // Your database operations remain the same up to the binding parameters
        $conn->begin_transaction();
        try {
            $stmt = $conn->prepare("INSERT INTO etudiants (Nom, Prenom, NNI, Email, password) VALUES (?, ?, ?, ?, ?)");
            if ($stmt) {
                $stmt->bind_param("sssss", $nom, $prenom, $matricule, $email, $password); // Binding $password directly
                $stmt->execute();
                $stmt->close();
            } else {
                throw new Exception("Erreur lors de la préparation de la requête pour la table etudiants: " . $conn->error);
            }

            $stmt = $conn->prepare("INSERT INTO e_atande (Nom, Prenom, NNI, Email, password) VALUES (?, ?, ?, ?, ?)");
            if ($stmt) {
                $stmt->bind_param("sssss", $nom, $prenom, $matricule, $email, $password); // Binding $password directly
                $stmt->execute();
                $stmt->close();
            } else {
                throw new Exception("Erreur lors de la préparation de la requête pour la table e_atande: " . $conn->error);
            }

            $conn->commit();
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
        } catch (Exception $e) {
            $conn->rollback();
            echo "Erreur lors de l'inscription : " . $e->getMessage();
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
