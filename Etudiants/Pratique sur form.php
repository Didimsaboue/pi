<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log in</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
    <?php
    include("Login.php");

    // Connection to the database
    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "Bourssi";

    $conn = new mysqli($server, $username, $password, $db);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
if(isset($_POST['mp'])){
    // Retrieve form data
    $email = $_POST['email'];
    $password = $_POST['mp'];
    
    // Query to check if email and password exist in the database
    $sql = "SELECT * FROM etudiants WHERE Email='$email' AND `password`='$password'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $result = $result->fetch_assoc();
        $_SESSION['etudiant'] = $result;
        // Email and password exist, redirect to Bourssi.html
        echo "<script> window.location.href = 'Bourssi.php';</script>";
        exit();
    } 
    
    else {

        // Email and password not found in the database, display "Sorry"
       echo "<script> Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'il y a un problème dans les identifiants!',
            footer: '<a href=\"Register.php\">vous avez pas encore inscrit? inscrivez vous</a>'
          });</script>";
    }
}
    $conn->close();
    ?>
</body>
</html>
