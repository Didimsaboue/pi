<!doctype html>
<html lang="en">
<?php
    session_start();
    $_SESSION['rand'] = rand(100000,999999);
    
   
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">


    <title>Mot de passe oubiler</title>
</head>

<body>


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
                                                    <h2 class="h4 text-center">Réinitialier le mot de passe</h2>
                                                    <h3 class="fs-6 fw-normal text-secondary text-center m-0">Fournissez
                                                        l'adresse email associée à votre compte pour récupérer votre mot
                                                        de passe.</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <form onsubmit="sendMail(event,<?= $_SESSION['rand'] ?>)" class="form" method="post" action="verifier_code.php">
                                            <div class="row gy-3 overflow-hidden">
                                                <div class="col-12">
                                                    <div class="form-floating mb-3">
                                                        <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required>
                                                        <label for="email" class="form-label">Email</label>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="d-grid">
                                                        <button class="btn btn-lg"  name="rec" type="submit" style="background-color: #0CEF89;">envoyer une code de verification</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        
                                              <div class="row">
                                            <div class="col-12">
                                                <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-center mt-5">
                                                    <a href="Pratique sur form.php" class="link-secondary text-decoration-none">Login</a>
                                                    <a href="Register.php" class="link-secondary text-decoration-none">Register</a>
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
    <script src="script.js"></script>

    <script
      type="text/javascript"
      src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"
    ></script>
    <script type="text/javascript">
      (function () {
        emailjs.init("FqAcklLOm6f0woady");
      })();
    </script>
    <!-- <script src="https://smtpjs.com/v3/smtp.js"></script> -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>

<!-- <script src="script.js"></script> -->
</html>

