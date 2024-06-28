<?php 
include('db_conn.php');
session_start();
$NNI = $_SESSION['NNI'];
$Statut = '';
$Nom = '';
$Prenom = '';

// Vérifier si l'étudiant existe dans la table "etudiants"
$query_etudiants = "SELECT * FROM etudiants WHERE NNI='$NNI'";
$result_etudiants = mysqli_query($conn, $query_etudiants);

if ($result_etudiants && mysqli_num_rows($result_etudiants) > 0) {
    $row = mysqli_fetch_assoc($result_etudiants);
    $Nom = $row['Nom'];
    $Photo=$row['Photo'];
    $Prenom = $row['Prenom'];
    $Statut = 'en Attend';
} else {
    // Vérifier si l'étudiant existe dans la table "e_accepte"
    $query_accepte = "SELECT * FROM e_accepte WHERE NNI='$NNI'";
    $result_accepte = mysqli_query($conn, $query_accepte);

    if ($result_accepte && mysqli_num_rows($result_accepte) > 0) {
        $row = mysqli_fetch_assoc($result_accepte);
        $Nom = $row['Nom'];
        $Photo=$row['Photo'];
        $Prenom = $row['Prenom'];
        $Statut = 'Accepter';
    } else {
        // Vérifier si l'étudiant existe dans la table "etudiant_refusee"
        $query_refusee = "SELECT * FROM e_refuse WHERE NNI='$NNI'";
        $result_refusee = mysqli_query($conn, $query_refusee);

        if ($result_refusee && mysqli_num_rows($result_refusee) > 0) {
            $row = mysqli_fetch_assoc($result_refusee);
            $Nom = $row['Nom'];
            $Photo=$row['Photo'];
            $Prenom = $row['Prenom'];
            $Statut = 'Refusee';
        }
    }
}
?>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>card</title>
    <link rel="stylesheet" href="./Profile-card.css" />
    <style>
    * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
    font-family: 'Times New Roman', Times, serif;
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  /* background: linear-gradient(#03a9f4, #03a9f4 45%, #fff 45%, #fff 100%); */
}

.card {
  position: relative;
  width: 300px;
  height: 400px;
  background: #fff;
  border-radius: 10px;
  background: linear-gradient(#03a9f4, #03a9f4 45%, #fff 45%, #fff 100%);
  border-top: 1px solid rgba(255, 255, 255, 0.5);
  backdrop-filter: blur(15px);
  box-shadow: 0 15px 25px rgba(0, 0, 0, 0.1);
}

.img-bx {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  border-radius: 10px;
  overflow: hidden;
  transform: translateY(30px) scale(0.5);
  transform-origin: top;
}

.img-bx img {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.content {
  position: absolute;
  width: 100%;
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: flex-end;
  padding-bottom: 30px;
}

.content .detail {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  text-align: center;
}

.content .detail h2 {
  color: #444;
  font-size: 1.6em;
  font-weight: bolder;
}

.content .detail h2 span {
  font-size: 0.7em;
  color: #03a9f4;
  font-weight: bold;
}

.sci {
  position: relative;
  display: flex;
  margin-top: 5px;
}

.sci li {
  list-style: none;
  margin: 4px;
}

.sci li a {
  width: 45px;
  height: 45px;
  display: flex;
  justify-content: center;
  align-items: center;
  border-radius: 50%;
  background: transparent;
  font-size: 1.5em;
  color: #444;
  text-decoration: none;
  box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
  transition: 0.5s;
}

.sci li a:hover {
  background: #03a9f4;
  color: #fff;
}
b{
  <?php 
    if($Statut=="en Attend"){
      echo "color: blue;";
    }

    ?>
  <?php 
    if($Statut=="Accepter"){
    echo"  color: #4caf50;";
    }
    ?>
  <?php 
    if($Statut=="Refusee"){
      echo "color: #f44336;";
    }
    ?>
}
.card{
  <?php 
    if($Statut=="en Attend"){
      echo "background: linear-gradient(#03a9f4, #03a9f4 45%, #fff 45%, #fff 100%);";
    }

    ?>
  <?php 
    if($Statut=="Accepter"){
    echo"  background: linear-gradient(#00ff00, #00ff00 45%, #fff 45%, #fff 100%);";
    }
    ?>
  <?php 
    if($Statut=="Refusee"){
      echo "background: linear-gradient(#ff0000, #ff0000 45%, #fff 45%, #fff 100%);";
    }
    ?>
}



    </style>
    <script
      src="https://kit.fontawesome.com/66aa7c98b3.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <div class="card" style="font-family: 'Times New Roman', Times, serif;">
      <div class="img-bx">
        <img src="images/<?php echo "$Photo" ?>" alt="img" />
      </div>
      
      <div class="content" style="margin-top: 20px;">
        <div class="detail">
          <h2 ><u ><?php  echo "$Nom $Prenom" ?></u><br /><br /><br /><span style="font-size: 25px;" >Statut:</span> <b><?php echo "$Statut" ?></b></h2>
         
        </div>
      </div>
    </div>
  </body>
</html>
