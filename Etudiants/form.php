<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "Bourssi";

$conn = new mysqli($server, $username, $password, $db);
session_start();
if (!isset($_SESSION['etudiant'])) {
    
    header("Location: login.php");
    exit();
}
$id=$_SESSION['etudiant'];
$NNI=$_SESSION['NNI'];
$r=true;
$p=true;
$a=true;
$sql = "SELECT Demande FROM etudiants WHERE NNI='$NNI'";
$result = $conn->query($sql);

if ($result) {
	$row = $result->fetch_assoc();


	// Check if $NNI exists in e_accepte table
	$sql_e_accepte = "SELECT COUNT(*) AS count FROM e_accepte WHERE NNI='$NNI'";
	$result_e_accepte = $conn->query($sql_e_accepte);

	if ($result_e_accepte) {
		$row_e_accepte = $result_e_accepte->fetch_assoc();
		if ($row_e_accepte['count'] > 0) {
			$a = false; // Set $r to false if NNI exists in e_accepte
			
		} else {
			// Check conditions if NNI does not exist in e_accepte
			if (isset($row['Demande']) && ($row['Demande'] !== null && $row['Demande'] !== "")) {
				$a = false; // Set $r to false if Demande is not empty
				
			} else {
				// Check if NNI exists in e_refuse table
				$sql_e_refuse = "SELECT NNI FROM e_refuse WHERE NNI='$NNI'";
				$result_e_refuse = $conn->query($sql_e_refuse);
				if ($result_e_refuse && $result_e_refuse->num_rows > 0) {
					$a=false; // Set $z to true if NNI exists in e_refuse
					
				}
			}
		}
	} else {
		// Handle query error for e_accepte table
		echo "Error fetching e_accepte data: " . $conn->error;
		// Optionally set $r or handle errors as appropriate
	}
} else {
	// Handle query error for etudiants table
	echo "Error fetching etudiants data: " . $conn->error;
	$a=false;
	// Optionally set $r or handle errors as appropriate
}








// Assuming $conn is your MySQLi connection object and $id is the student's id

// Construct the SQL query
$sql = "SELECT Nom FROM e_atande WHERE NNI = $NNI";

// Execute the query
$result = $conn->query($sql);

// Check if the query was successful and there is at least one result
if ($result && $result->num_rows > 0) {
    // Fetch the result as an associative array
    $row = $result->fetch_assoc();
    
    // Assign the value of 'Nom' to a variable
    $nom = $row['Nom'];
    
    // Output the result (for demonstration purposes)
    
} 

// Vérifiez si la session de l'étudiant est définie
if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
	
	$image_name = $_FILES["image"]["name"];
	$target_dir = "images/"; // Directory where you want to save the image
	$target_file = $target_dir . basename($image_name);

	// Move the uploaded file to the target directory
	if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
		// Insert the image name into the database
		$sql = "UPDATE etudiants SET Photo = '$image_name' WHERE NNI = '$NNI'";
		// $conn->query($sql);
		if ($conn->query($sql) === TRUE) {
			$ok='ok';
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	} 
	
}

if (isset($_FILES["atestation"]) && $_FILES["atestation"]["error"] == 0) {

    // Get the original file name
    $atestation_name = $_FILES["atestation"]["name"];

    // Extract the file extension
    $file_extension = pathinfo($atestation_name, PATHINFO_EXTENSION);

    // Create the new file name using the student's ID and the original extension
    $new_filename = $id . "." . $file_extension;

    // Define the target directory
    $target_dir = "atestations/";

    // Define the target file path
    $target_file = $target_dir . $new_filename;

    // Move the uploaded file to the target directory
    if (move_uploaded_file($_FILES["atestation"]["tmp_name"], $target_file)) {
        // Insert the new file name into the database
        $sql = "UPDATE etudiants SET Atestation = '$new_filename' WHERE id = '$id'";

        if ($conn->query($sql) === TRUE) {
            $ok="ook";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}


if (isset($_FILES["carte"]) && $_FILES["carte"]["error"] == 0) {
	$Tel=$_POST['Tel'];
	$cartre_name = $_FILES["carte"]["name"];
	$target_dir = "carte/"; // Directory where you want to save the image
	$target_file = $target_dir . basename($cartre_name);

	// Move the uploaded file to the target directory
	if (move_uploaded_file($_FILES["carte"]["tmp_name"], $target_file)) {
		// Insert the image name into the database
		$sql = "UPDATE e_accepte SET Carte = '$cartre_name' WHERE NNI = '$NNI'";
		// $conn->query($sql);
		if ($conn->query($sql) === TRUE) {
			$yes="yes";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	} else {
		echo "Sorry, there was an error uploading your file.";
	}
	$sql = "UPDATE e_accepte SET Tel = '$Tel' WHERE NNI = '$NNI'";
	$conn->query($sql);
}
if (isset($_POST['sb'])) {
	
	$Demande=$_POST['Demande'];
	$Matricule=$_POST['matricule'];
	$sql = "UPDATE etudiants SET Demande = '$Demande' WHERE NNI = '$NNI'";
	if ($conn->query($sql) === TRUE) {
		$ok='ok';;
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	$Matricule=$_POST['matricule'];
	$sql = "UPDATE etudiants SET Matricule = '$Matricule' WHERE NNI = '$NNI'";
	if ($conn->query($sql) === TRUE) {
		$ok='ok';;
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$Depatements=$_POST['departements'];
	$sql = "UPDATE etudiants SET Specialite = '$Depatements' WHERE NNI = '$NNI'";
	if ($conn->query($sql) === TRUE) {
		$ok='ok';;
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;

	}
	
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Demande</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


    <link rel="stylesheet" href="css1/animate.css">
    
    <link rel="stylesheet" href="css1/owl.carousel.min.css">
    <link rel="stylesheet" href="css1/owl.theme.default.min.css">
    <link rel="stylesheet" href="css1/magnific-popup.css">
    
    <link rel="stylesheet" href="css1/flaticon.css">
    <link rel="stylesheet" href="css1/style.css">
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
	 
	  
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar ftco-navbar-light site-navbar-target" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="Bourssii.php">Bourssi<span>.</span></a>
	      <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav nav ml-auto">
	          <li class="nav-item"><a href="Bourssii.php" class="nav-link"><span>Home</span></a></li>
	          <li class="nav-item"><a href="Bourssii.php" class="nav-link"><span>CNOU</span></a></li>
	          <li class="nav-item"><a href="Bourssii.php" class="nav-link"><span>Bourssi</span></a></li>
	          <li class="nav-item"><a href="Bourssii.php" class="nav-link"><span>Author</span></a></li>
	          <li class="nav-item"><a href="Bourssii.php" class="nav-link"><span>Contact</span></a></li>
	          <li class="nav-item"><a href="form.php" class="nav-link active"><span>Demande</span></a></li>
	         <?php if($a==false){ ?> <li class="nav-item"><a href="show.php" class="nav-link "><span>Resultat</span></a></li><?php } ?>
			  <button class="btn btn-primary py-3 px-4" onclick="window.location.href='deconnexion.php'">Se-Deconnectez</button>
	        </ul>
	      </div>
	    </div>
	  </nav>

	  <section class="hero-wrap js-fullheight">
      
      <div class="container-fluid px-0">
      	<div class="row d-md-flex no-gutters slider-text align-items-center js-fullheight justify-content-end">
	      	<img class="one-third js-fullheight align-self-end order-md-last img-fluid" src="bg.svg" alt="">
	        <div class="one-forth d-flex align-items-center ftco-animate js-fullheight">
	        	<div class="text mt-5">
	        		<span class="subheading">Portail des Bourses, Aides Étudiantes</span>
		  				<h1>Bourssi: Guide des Bourses</h1>
		  				<p>Ce site est une ressource essentielle pour les étudiants, offrant des informations sur les programmes et bourses du ministère de l'Éducation en collaboration avec le CNOU, y compris les aides mensuelles. Il est la référence unique pour ces informations, développé par SupNum.</p>
		  				<style>
							.btn-primary {
								cursor: pointer !important;
								z-index: 10000;
							}
							.form-style-5{
	max-width: 80%;
	padding: 10px 20px;
	background: #f4f7f8;
	margin: 10px auto;
	padding: 20px;
	background: #f4f7f8;
	border-radius: 8px;
	font-family: Georgia, "Times New Roman", Times, serif;
}
.form-style-5 fieldset{
	border: none;
}
.form-style-5 legend {
	font-size: 1.4em;
	margin-bottom: 10px;
}
.form-style-5 label {
	display: block;
	margin-bottom: 8px;
}
.form-style-5 input[type="text"],
.form-style-5 input[type="date"],
.form-style-5 input[type="datetime"],
.form-style-5 input[type="email"],
.form-style-5 input[type="number"],
.form-style-5 input[type="search"],
.form-style-5 input[type="time"],
.form-style-5 input[type="url"],
.form-style-5 textarea,
.form-style-5 select {
	font-family: Georgia, "Times New Roman", Times, serif;
	background: rgba(255,255,255,.1);
	border: none;
	border-radius: 4px;
	font-size: 15px;
	margin: 0;
	outline: 0;
	padding: 10px;
	width: 100%;
	box-sizing: border-box; 
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box; 
	background-color: #e8eeef;
	color:#8a97a0;
	-webkit-box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
	box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
	margin-bottom: 30px;
}
.form-style-5 input[type="text"]:focus,
.form-style-5 input[type="date"]:focus,
.form-style-5 input[type="datetime"]:focus,
.form-style-5 input[type="email"]:focus,
.form-style-5 input[type="number"]:focus,
.form-style-5 input[type="search"]:focus,
.form-style-5 input[type="time"]:focus,
.form-style-5 input[type="url"]:focus,
.form-style-5 textarea:focus,
.form-style-5 select:focus{
	background: #d2d9dd;
}
.form-style-5 select{
	-webkit-appearance: menulist-button;
	height:35px;
}
.form-style-5 .number {
	background: #1abc9c;
	color: #fff;
	height: 30px;
	width: 30px;
	display: inline-block;
	font-size: 0.8em;
	margin-right: 4px;
	line-height: 30px;
	text-align: center;
	text-shadow: 0 1px 0 rgba(255,255,255,0.2);
	border-radius: 15px 15px 15px 0px;
}

.form-style-5 input[type="submit"],
.form-style-5 input[type="button"]
{
	position: relative;
	display: block;
	padding: 19px 39px 18px 39px;
	color: #FFF;
	margin: 0 auto;
	background: #1abc9c;
	font-size: 18px;
	text-align: center;
	font-style: normal;
	width: 100%;
	border: 1px solid #16a085;
	border-width: 1px 1px 3px;
	margin-bottom: 10px;
}
.form-style-5 input[type="submit"]:hover,
.form-style-5 input[type="button"]:hover
{
	background: #109177;
}
.disabled {
            pointer-events: none; /* Disable interactions */
            opacity: 0.5;         /* Make it look disabled */
            position: relative;
			cursor: no-drop;
        }

        .disabled::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.6);
            z-index: 1;
        }
							
						</style>
						
	          </div>
	        </div>
	    	</div>
      </div>
    </section>

   
    <div class="form-style-5">
<form method="post"  enctype="multipart/form-data">
<?php
// Assuming $conn is your database connection object

// Ensure $id and $NNI are set and not empty
if (isset($id) && isset($NNI)) {
    // Query to fetch Demande from etudiants table
    $sql = "SELECT Demande FROM etudiants WHERE NNI='$NNI'";
    $result = $conn->query($sql);

    if ($result) {
        $row = $result->fetch_assoc();

        // Check if $NNI exists in e_accepte table
        $sql_e_accepte = "SELECT COUNT(*) AS count FROM e_accepte WHERE NNI='$NNI'";
        $result_e_accepte = $conn->query($sql_e_accepte);

        if ($result_e_accepte) {
            $row_e_accepte = $result_e_accepte->fetch_assoc();
            if ($row_e_accepte['count'] > 0) {
                $r = false; // Set $r to false if NNI exists in e_accepte
            } else {
                // Check conditions if NNI does not exist in e_accepte
                if (isset($row['Demande']) && ($row['Demande'] !== null && $row['Demande'] !== "")) {
                    $r = false; // Set $r to false if Demande is not empty
                } else {
                    // Check if NNI exists in e_refuse table
                    $sql_e_refuse = "SELECT NNI FROM e_refuse WHERE NNI='$NNI'";
                    $result_e_refuse = $conn->query($sql_e_refuse);
                    if ($result_e_refuse && $result_e_refuse->num_rows > 0) {
                        $r=false; // Set $z to true if NNI exists in e_refuse
                    }
                }
            }
        } else {
            // Handle query error for e_accepte table
            echo "Error fetching e_accepte data: " . $conn->error;
            // Optionally set $r or handle errors as appropriate
        }
    } else {
        // Handle query error for etudiants table
        echo "Error fetching etudiants data: " . $conn->error;
        // Optionally set $r or handle errors as appropriate
		$r=false;

    }
} else {
    // Handle case where $id or $NNI is not set
    echo "ID or NNI is not set.";
    // Optionally set $r or handle errors as appropriate
}

?>


<fieldset <?php if ($r==false) { ?> class="disabled" <?php }   ?> >



<legend><span class="number">I</span>Profil scholaire</legend>
<input type="text" name="nom" value="<?php echo $nom ?>" disabled>
<input type="text" name="matricule" placeholder="Matricule *" <?php  if($r==true){?> required <?php  } ?>>
<input type="email" name="email" placeholder="Email *" <?php  if($r==true){?> required <?php  } ?>>
<textarea name="Demande" placeholder="Demande ecrit" <?php  if($r==true){?> required <?php  } ?>></textarea>
<!--Avatar-->
<div>
    <div class="d-flex  mb-4" >
        <img id="selectedAvatar" src="https://mdbootstrap.com/img/Photos/Others/placeholder-avatar.jpg"
        class="rounded-circle" style="width: 200px; height: 200px; object-fit: cover;" alt="example placeholder" />
    </div>
    <div class="d-flex " style="margin-left:30px" >
        <div data-mdb-ripple-init class="btn btn-primary btn-rounded">
            <label class="form-label text-white m-1" for="customFile2" >Votre Photo</label>
            <input type="file" class="form-control d-none" id="customFile2" name="image" onchange="displaySelectedImage(event, 'selectedAvatar')" <?php  if($r==true){?> required <?php  } ?>/>
        </div>
    </div><br>
	<!--Image-->
<div>
    <div class="mb-4 d-flex ">
        <img id="selectedImage" src="https://mdbootstrap.com/img/Photos/Others/placeholder.jpg"
        alt="👍👍ficher selectionee avec succes" style="width: 300px;" />
    </div>
    <div class="d-flex "style="margin-left:30px">
        <div data-mdb-ripple-init class="btn btn-primary btn-rounded">
            <label class="form-label text-white m-1" for="customFile1">Votre atestation en PDF</label>
            <input type="file" accept=".pdf" class="form-control d-none" id="customFile1" name="atestation" onchange="displaySelectedImage(event, 'selectedImage')" <?php  if($r==true){?> required <?php  } ?> />
        </div>
    </div>
</div><br>
</div>
<label for="job">Departements:</label>
<select id="job" name="departements" <?php  if($r==true){?> required <?php  } ?>>

  <option value="Institut superieure de numerique">SupNum</option>
  <option value="ISCAE">ISCAE</option>
  <option value="IP">IP</option>


  <option value="Faculte de science technique">FST</option>
  <option value="Annexe">Annexe</option>
  <option value="Faculte de medecines ">FM</option>
  
</select>
</fieldset>
<fieldset <?php $sql = "SELECT Carte FROM e_accepte WHERE NNI='$NNI'"; $result = $conn->query($sql); if ($result && $result->num_rows == 0) { $p = false; ?> class="disabled" <?php }?>>

<legend><span class="number">II</span>Finaliser votre profil scholaire</legend>
<!--Image-->
<div>
    <div class="mb-4 d-flex ">
        <img id="selectedCarte" src="https://mdbootstrap.com/img/Photos/Others/placeholder.jpg"
        alt="example placeholder" style="width: 300px;" />
    </div>
    <div class="d-flex "style="margin-left:30px">
        <div data-mdb-ripple-init class="btn btn-primary btn-rounded">
            <label class="form-label text-white m-1" for="customFile3" >Votre Carte d'identite</label>
            <input type="file" class="form-control d-none" id="customFile3" name="carte" onchange="displaySelectedImage(event, 'selectedCarte')" accept="*/*"  />
        </div>
    </div>
</div><br>
<input type="text" name="Tel" placeholder="Numero telephone *">
</fieldset>
<input type="submit" value="Submit" name="sb" <?php     if ( $r == false && $p == false ) { echo "disabled" ; }    ?> />
</form>
</div>
		

	<footer class="text-center text-lg-start text-dark" style="background-color: #ECEFF1">



		<section class="">
		  <div class="container text-center text-md-start mt-5">
	
			<div class="row mt-3">
	
			  <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
	
				<h6 class="text-uppercase fw-bold">Bourssi</h6>
				<hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: rgb(20, 171, 20); height: 2px" />
				<p>
				  Ici vous peux nous contactez en cas que vous avez un question ou vous veux plus d'informations .
				</p>
			  </div>
	
	
	
			  <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
	
				<h6 class="text-uppercase fw-bold">Avantages</h6>
				<hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: rgb(20, 171, 20); height: 2px" />
				<p>
				  <a href="#!" class="text-dark">Efficasse</a>
				</p>
				<p>
				  <a href="#!" class="text-dark">Rapid</a>
				</p>
				<p>
				  <a href="#!" class="text-dark">Sur</a>
				</p>
			  </div>
	
	
	
	
	
	
	
			  <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
	
				<h6 class="text-uppercase fw-bold">Contact</h6>
				<hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: rgb(20, 171, 20); height: 2px" />
				<p><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
					class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
					<path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
				  </svg> Nktt, tevragh zeina, Mauritanie</p>
				<p><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope"
					viewBox="0 0 16 16">
					<path
					  d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
				  </svg> info@example.com</p>
				<p><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
					class="bi bi-telephone-fill" viewBox="0 0 16 16">
					<path fill-rule="evenodd"
					  d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
				  </svg> + 222 xxx xxx xx</p>
				<p><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
					class="bi bi-telephone" viewBox="0 0 16 16">
					<path
					  d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
				  </svg> + 222 xxx xxx xx</p>
			  </div>
	
			</div>
		  </div>
		</section>
	
	  </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js1/jquery.min.js"></script>
  <script src="js1/jquery-migrate-3.0.1.min.js"></script>
  <script src="js1/popper.min.js"></script>
  <script src="js1/bootstrap.min.js"></script>
  <script src="js1/jquery.easing.1.3.js"></script>
  <script src="js1/jquery.waypoints.min.js"></script>
  <script src="js1/jquery.stellar.min.js"></script>
  <script src="js1/owl.carousel.min.js"></script>
  <script src="js1/jquery.magnific-popup.min.js"></script>
  <script src="js1/jquery.animateNumber.min.js"></script>
  <script src="js1/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js1/google-map.js"></script>
  <script>
  function displaySelectedImage(event, elementId) {
    const selectedImage = document.getElementById(elementId);
    const fileInput = event.target;

    if (fileInput.files && fileInput.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
            selectedImage.src = e.target.result;
        };

        reader.readAsDataURL(fileInput.files[0]);
    }
}
</script>
  <script src="js1/main.js"></script>
    
  </body>
</html>