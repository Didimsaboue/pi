

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
    <title>recuperer la mot de passe</title>
</head>
<body>
<?php
session_start();
$email = $_SESSION["em"];
include('db_conn.php');
if(isset($_POST["rec"])){
    $code = $_POST["code"];
   
if ($_POST["code"] == $_POST['code2']) {
    // Requête SQL pour insérer les données dans la base de données
    $sql = "UPDATE etudiants set  password = '$code' where email = '$email';";
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

    <section class="bg-light p-3 p-md-4 p-xl-5" style="margin-top: -30px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-xxl-11">
                    <div class="card border-light-subtle shadow-sm">
                        <div class="row g-0">
                            <div class="col-12 col-md-6">
                                <img class="img-fluid rounded-start w-70 h-100 " style="margin-left: 10px;" loading="lazy" src="undraw_forgot_password_re_hxwm.svg" alt="Welcome back you've been missed!">
                            </div>
                            <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                                <div class="col-12 col-lg-11 col-xl-10">
                                    <div class="card-body p-3 p-md-4 p-xl-5">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-5">
                                                    <div class="text-center mb-4">
                                                        <a href="#!">
                                                            <img src="Cnou.jpeg" alt="Supnum Logo" width="60" height="57">
                                                        </a>
                                                    </div>
                                                    <h2 class="h4 text-center">mettre unr nouvelle code  </h2>
                                                    <h3 class="fs-6 fw-normal text-secondary text-center m-0">Fournissez
                                                        le code que vous voulez etre votre nouvelle code </h3>
                                                </div>
                                            </div>
                                        </div>
                                        <form class="form" method="post">
                                            <div class="row gy-3 overflow-hidden">
                                                <div class="col-12">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" name="code" id="verify-email" placeholder="name@example.com" required>
                                                        <label for="email" class="form-label">nouveau code</label>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-floating mb-3">
                                                        <input type="text"  class="form-control" name="code2" id="verify-email" placeholder="name@example.com" required>
                                                        <label for="email" class="form-label">confirmer votre nouveau code</label>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="d-grid">
                                                        <button class="btn btn-lg"  name="rec"  style="background-color: #0CEF89;">envoyer</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                              <div class="row">
                                            <div class="col-12">
                                                <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-center mt-5">
                                                    <a href="Pratique sur form.php" class="link-secondary text-decoration-none">Login</a>
                                                    <a href="Register.php" class="link-secondary text-decoration-none">Register</a>
                                                    <a href="Forgot password.php" class="link-secondary text-decoration-none">return</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script
      type="text/javascript"
      src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>
    <!-- <script src="https://smtpjs.com/v3/smtp.js"></script> -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>

<!-- <script src="script.js"></script> -->
</html>