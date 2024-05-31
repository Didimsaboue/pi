<!-- if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
	$image_name = $_FILES["image"]["name"];
	$target_dir = "images/"; // Directory where you want to save the image
	$target_file = $target_dir . basename($image_name);

	// Move the uploaded file to the target directory
	if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
		// Insert the image name into the database
		$sql = "INSERT INTO images (image_name) VALUES ('$image_name')";
		if ($conn->query($sql) === TRUE) {
			echo "Image uploaded successfully.";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	} else {
		echo "Sorry, there was an error uploading your file.";
	} -->


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Bourssi</title>
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
			<?php
session_start();
if(!isset($_SESSION['etudiant'])){
?>
	          <li class="nav-item"><a href="#home-section" class="nav-link"><span>Home</span></a></li>
	          <li class="nav-item"><a href="#about-section" class="nav-link"><span>CNOU</span></a></li>
	          <li class="nav-item"><a href="#chapter-section" class="nav-link"><span>Bourssi</span></a></li>
	          <li class="nav-item"><a href="#author-section" class="nav-link"><span>Author</span></a></li>
	          <li class="nav-item"><a href="#contact-section" class="nav-link"><span>Contact</span></a></li>
			  <button class="btn btn-primary py-3 px-4" onclick="window.location.href='Login.php'">Se-Connectez</button>
	        <?php }
			else { ?>
			<li class="nav-item"><a href="#home-section" class="nav-link"><span>Home</span></a></li>
	          <li class="nav-item"><a href="#about-section" class="nav-link"><span>CNOU</span></a></li>
	          <li class="nav-item"><a href="#chapter-section" class="nav-link"><span>Bourssi</span></a></li>
	          <li class="nav-item"><a href="#author-section" class="nav-link"><span>Author</span></a></li>
	          <li class="nav-item"><a href="#contact-section" class="nav-link"><span>Contact</span></a></li>
	          <li class="nav-item"><a href="form.php" class="nav-link active"><span>Demande</span></a></li>
			  <button class="btn btn-primary py-3 px-4" onclick="window.location.href='deconnexion.php'">Se-Deconnectez</button>
			<?php } ?>
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
							
						</style>
						
	          </div>
	        </div>
	    	</div>
      </div>
    </section>

   
    <section class="ftco-about img ftco-section" id="about-section">
    	<div class="container">
    		<div class="row d-flex no-gutters">
    			<div class="col-md-6 col-lg-6 d-flex">
    				<div class="img-about img d-flex align-items-stretch">
    					<div class="overlay"></div>
	    				<div class="img d-flex align-self-stretch align-items-center" style="background-image:url(CNOUS-CROUS_Banner.jpg);">
	    				</div>
    				</div>
    			</div>
    			<div class="col-md-6 col-lg-6 pl-md-5">
    				<div class="row justify-content-start pb-3">
		          <div class="col-md-12 heading-section ftco-animate">
		            <h2 class="mb-4">À propos du <b style="color:rgb(20, 171, 20)">CNOU</b></h2>
		            <p>Notre organisme, connu sous le nom de CNOU, est comme un fleuve scientifique qui traverse le parcours universitaire et offre des services essentiels aux étudiants pour enrichir leur expérience universitaire. Nous offrons un environnement universitaire renouvelé et inspirant, où les services universitaires essentiels vous viennent naturellement, ce qui contribue à votre réussite académique en toute simplicité.</p>
		            <div class="text-about">
		            	<h4 style="color:rgb(20, 171, 20)">Aide financière</h4>
			            <p>CNOU fournit un soutien financier mensuel à la plupart des étudiants, les aidant à faire face aux coûts mensuels et à atteindre avec succès leurs objectifs éducatifs.</p>
			            <h4 style="color:rgb(20, 171, 20)">Restaurants universitaires</h4>
			            <p>Le CNOU propose des services de restauration universitaire diversifiés et abordables aux étudiants, leur garantissant des repas sains et nutritifs sur le campus.</p>
			            <h4 style="color:rgb(20, 171, 20)">Poursuivre le développement des services</h4>
			            <p>Le CNOU continue de développer régulièrement ses services, en lançant à chaque fois de nouveaux services, dans le but de mieux répondre aux besoins des étudiants et d’améliorer leur expérience universitaire.</p>
		            </div>
		          </div>
		        </div>
	        </div>
        </div>
    	</div>
    </section>

    <section class="ftco-section ftco-no-pt ftco-no-pb ftco-counter img" id="section-counter">
    	<div class="container">
				<div class="row d-md-flex align-items-center align-items-stretch">
          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 bg-light">
              <div class="text">
                <strong class="number" data-number="100"></strong><b style="color:rgb(20, 171, 20)">Ans</b>
                <span>Cela a duré plus de</span>
              </div>
            </div>
          </div>
          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 bg-light">
              <div class="text">
                <strong class="number" data-number="1000000">0</strong> <b style="color:rgb(20, 171, 20)">Etudiants</b>
                <span>a Servi plus que </span>
              </div>
            </div>
          </div>
          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 bg-light">
              <div class="text">
                <strong class="number" data-number="10000">0</strong><b style="color:rgb(20, 171, 20)">Problèmes résolues</b>
                <span>Plus que</span>
              </div>
            </div>
          </div>
         
        </div>
      </div>
    </section>

    <section class="ftco-section ftco-no-pb ftco-no-pt" id="chapter-section">
    	<div class="container">
    		<div class="row justify-content-center py-5 mt-5">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">Et apropos de <b style="color:rgb(20, 171, 20)">Bourssi</b></h2>
          </div>
        </div>
    		<div class="row">
    			<div class="col-md-3 mb-4">
				    <nav id="navi">
					    <ul>
					      <li><a href="#page-1">Description</a></li>
					      <li><a href="#page-2">Propriétés</a></li>
					      <li><a href="#page-3">Avantages</a></li>
					      <li><a href="#page-4">Partenariats </a></li>
					      <li><a href="#page-5">Sécurité</a></li>
					      
					    </ul>
					  </nav>
					</div>
					<div class="col-md-9">
					  <div id="page-1" class= "page bg-light one">
					  	<h2 class="heading" style="color:rgb(20, 171, 20)">Description</h2>
					  	<p>Bourssi" est un site web révolutionnaire développé par des étudiants de SupNum en collaboration avec CNOU.Bourssi est la première et unique plateforme de demande de bourse, Il vise à simplifier le processus de demande de bourse et à rapprocher les étudiants de CNOU. Grâce à son interface conviviale et à ses fonctionnalités innovantes, Bourssi permet aux étudiants de soumettre facilement leurs demandes de bourse en ligne, tout en fournissant des informations détaillées sur les programmes de bourses disponibles. Avec Bourssi, l'accès au soutien financier pour les études devient plus accessible que jamais, ouvrant ainsi la voie à un avenir académique prometteur pour tous les étudiants</p>
					  </div>
					  <div id="page-2" class= "page bg-light two">
					  	<h2 class="heading" style="color:rgb(20, 171, 20)">Propriétés</h2>
					  	<p><b style="color:rgb(20, 171, 20)">--</b> Accessible à tous les étudiants : Bourssi est un site web ouvert à tous les étudiants, où qu'ils se trouvent. <br>
							<b style="color:rgb(20, 171, 20)">--</b> Formulaire de demande de bourse : Les étudiants boursés ont la possibilité de demander leurs bourses via un formulaire en ligne, simplifiant ainsi le processus. <br>
							<b style="color:rgb(20, 171, 20)">--</b> Formulaire de réclamation : Tout étudiant désirant formuler une réclamation peut le faire en remplissant un formulaire dédié, garantissant ainsi un traitement efficace et équitable de toutes les réclamations. <br>
							<b style="color:rgb(20, 171, 20)">--</b> Communication avec CNOU : Les étudiants ont la possibilité de communiquer directement avec CNOU via Bourssi, facilitant ainsi les échanges et la résolution des problèmes éventuels</p>
					  </div>
					  <div id="page-3" class= "page bg-light three">
						<h2 class="heading" style="color:rgb(20, 171, 20)">Avantages</h2>
					  	<p> <b style="color:rgb(20, 171, 20)">--</b> Accessibilité universelle : Tous les étudiants peuvent accéder à Bourssi, quel que soit leur emplacement. <br>
							<b style="color:rgb(20, 171, 20)">--</b> Simplification du processus de demande de bourse : Les étudiants boursés peuvent demander leurs bourses facilement via un formulaire en ligne. <br>
							<b style="color:rgb(20, 171, 20)">--</b> Traitement efficace des réclamations : Bourssi offre un formulaire dédié pour toute réclamation, garantissant un traitement rapide et équitable. <br>
							<b style="color:rgb(20, 171, 20)">--</b> Communication directe avec CNOU : Les étudiants peuvent communiquer directement avec CNOU via Bourssi pour toute question ou préoccupation. <br>
							<b style="color:rgb(20, 171, 20)">--</b> Centralisation des services : Bourssi regroupe tous les services liés aux bourses d'études en un seul endroit, offrant ainsi une expérience utilisateur plus fluide et efficace.</p> 
					  </div>
					  <div id="page-4" class= "page bg-light four">
					    <h2 class="heading" style="color:rgb(20, 171, 20)">Partenariats et collaborations</h2>
					    <p>Les partenariats et collaborations de Bourssi avec des institutions éducatives et d'autres organisations renforcent son impact. En travaillant ensemble, Bourssi peut offrir un accès privilégié à des ressources éducatives et des opportunités de financement supplémentaires pour les étudiants. Ces collaborations permettent également à Bourssi de rester à jour sur les dernières tendances éducatives et de s'adapter pour mieux servir les besoins des étudiants. En fin de compte, ces partenariats renforcent l'impact de Bourssi en rendant l'éducation plus accessible et équitable pour tous.</p>
					  </div>
					  <div id="page-5" class= "page bg-light five">
					    <h2 class="heading" style="color:rgb(20, 171, 20)">Sécurité</h2>
					    <p>La sécurité  de Bourssi est une priorité absolue. Nous utilisons des méthodes d'authentification sécurisées et des mesures de confidentialité strictes pour garantir que chaque étudiant a un accès sécurisé à ses propres informations. De plus, notre système restreint l'accès aux données personnelles et financières, empêchant tout accès non autorisé. En mettant en œuvre ces mesures, Bourssi assure la sécurité et la confidentialité des informations des étudiants, offrant ainsi une expérience utilisateur fiable et sécurisée.</p>
					  </div>
					 
					  
					  
					</div>
			  </div>
    	</div>
    </section>

    <section class="ftco-section ftco-no-pt">
    	<div class="container">
    		<div class="row justify-content-center py-5 mt-5">
          <div class="col-md-5 heading-section text-center ftco-animate">
          	<span class="subheading">Services</span>
            <h2 class="mb-4">Services</h2>
          </div>
        </div>
    		<div class="row">
					<div class="col-md-4 text-center d-flex ftco-animate">
						<div class="services-1 bg-light">
							<span class="icon">
								<i class="flaticon-user-experience"></i>
							</span>
							<div class="desc">
								<h3 class="mb-5">Plateforme de demande</h3>
								<p>Les étudiants peuvent soumettre leur demande de bourse directement sur la plateforme Bourssi, simplifiant ainsi le processus.</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 text-center d-flex ftco-animate">
						<div class="services-1 bg-light">
							<span class="icon">
								<i class="flaticon-network"></i>
							</span>
							<div class="desc">
								<h3 class="mb-5">Communication avec CNOU</h3>
								<p>Les étudiants peuvent communiquer directement avec CNOU via Bourssi pour poser des questions ou recevoir un soutien supplémentaire.</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 text-center d-flex ftco-animate">
						<div class="services-1 bg-light">
							<span class="icon">
								<i class="flaticon-innovation"></i>
							</span>
							<div class="desc">
								<h3 class="mb-5">Suivi des demandes</h3>
								<p>Les étudiants peuvent suivre l'état de leur demande de bourse et recevoir des notifications en temps réel sur les mises à jour.</p>
							</div>
						</div>
					</div>
				</div>
    	</div>
    </section>



		<section class="ftco-about img ftco-section ftco-no-pt ftco-no-pb" id="author-section">
    	<div class="container">
    		<div class="row d-flex no-gutters">
    			<div class="col-md-6 col-lg-6 d-flex">
    				<div class="img-about img d-flex align-items-stretch">
    					<div class="overlay"></div>
	    				<div class="img d-flex align-self-stretch align-items-center" style="background-image:url(University.gif);">
	    				</div>
    				</div>
    			</div>
    			<div class="col-md-6 col-lg-6 d-flex">
    				<div class="py-md-5 w-100 bg-light px-md-5">
    					<div class="py-md-5">
		    				<div class="row justify-content-start pb-3">
				          <div class="col-md-12 heading-section ftco-animate">
				          	<span class="subheading">En savoir plus sur Bourssi</span>
				            <h2 class="mb-4">Bourssi</h2>
				            <p>Bourssi simplifie le processus de demande de bourse et offre un accès facile à des ressources éducatives pour les étudiants.</p>
				            <ul class="about-info mt-4 px-md-0 px-2">
				            	<li class="d-flex"><span>Devlloper:</span> <span>Etudiants de SupNum</span></li>
				            	<li class="d-flex"><span>Propriétaire:</span> <span>CNOU</span></li>
				            	<li class="d-flex"><span>link:</span> <span>www.Bourssimr.com</span></li>
				            	<li class="d-flex"><span>Email:</span> <span>SupNum@supnum.com</span></li>
				            	<li class="d-flex"><span>T-Phone: </span> <span>+222XXXXXXXX</span></li>
				            </ul>
				          </div>
				        </div>
			          
			        </div>
		        </div>
	        </div>
        </div>
    	</div>
    </section>

    <section class="ftco-section contact-section ftco-no-pb" id="contact-section">
      <div class="container">
      	<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2 class="mb-4">Nous-Contactez</h2>
            <p>Nous somme la pour tout etudiants</p>
          </div>
        </div>

        <div class="row d-flex contact-info mb-5">
          <div class="col-md-6 col-lg-3 d-flex ftco-animate">
          	<div class="align-self-stretch box text-center p-4 bg-light">
          		<div class="icon d-flex align-items-center justify-content-center">
          			<span class="fa fa-map-marker"></span>
          		</div>
          		<div>
	          		<h3 class="mb-4">Address</h3>
		            <p>Supnum 42M5+PGV, Mauritanie</p>
		          </div>
	          </div>
          </div>
          <div class="col-md-6 col-lg-3 d-flex ftco-animate">
          	<div class="align-self-stretch box text-center p-4 bg-light">
          		<div class="icon d-flex align-items-center justify-content-center">
          			<span class="fa fa-phone"></span>
          		</div>
          		<div>
	          		<h3 class="mb-4">Contact Numero</h3>
		            <p><a href="tel://22227582750">+222 XXXXXXXX</a></p>
	            </div>
	          </div>
          </div>
          <div class="col-md-6 col-lg-3 d-flex ftco-animate">
          	<div class="align-self-stretch box text-center p-4 bg-light">
          		<div class="icon d-flex align-items-center justify-content-center">
          			<span class="fa fa-paper-plane"></span>
          		</div>
          		<div>
	          		<h3 class="mb-4">Email Address</h3>
		            <p><a href="mailto:23039@supnum.mr">SupNum@supnum.mr</a></p>
		          </div>
	          </div>
          </div>
          <div class="col-md-6 col-lg-3 d-flex ftco-animate">
          	<div class="align-self-stretch box text-center p-4 bg-light">
          		<div class="icon d-flex align-items-center justify-content-center">
          			<span class="fa fa-globe"></span>
          		</div>
          		<div>
	          		<h3 class="mb-4">Website</h3>
		            <p><a href="#">yoursite.com</a></p>
	            </div>
	          </div>
          </div>
        </div>

       
      </div>
    </section>
		

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
  
  <script src="js1/main.js"></script>
    
  </body>
</html>