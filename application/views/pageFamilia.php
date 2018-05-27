<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<!DOCTYPE html>
	<html lang="en" class="htmlanimation">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
        <link rel="icon" href="<?php echo base_url();?>Resources/fb-logo.ico">
		<title>Informes</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/reset.css">
		<!-- Bootstrap core CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/style.css">
		<link rel="stylesheet" href="<?php echo base_url();?>font-awesome/css/fontawesome-all.css">
		<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
         rel = "stylesheet">
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<link href="https://fonts.googleapis.com/css?family=Fira+Sans|Lora|Oswald" rel="stylesheet">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<!-- Custom styles for this template -->
		<style type="text/css">
			body {
                margin-top:5rem;

			}
			.starter-template {
				padding: 3rem 1.5rem;
				text-align: center;
			}


            @media (max-width: 770px) {
                .main {
                    display: none;
                }
            }
            @media (min-width: 771px) {
                .main {
                    display: block;
                }
			}
			.card-principal{
				box-shadow:0px 0px 30px #333!important;
			}

		</style>

	</head>
	<body>
	<link href="<?php echo base_url(); ?>css/scrolling-nav.css" rel="stylesheet">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a class="navbar-brand  w3-animate-top" href="#">INFORMES DE EVALUACIÓN</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Temas</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item dropdown-tema-dark" href="#">Dark</a>
                        <a class="dropdown-item dropdown-tema-ocre" href="#">Ocre</a>
                        <a class="dropdown-item dropdown-tema-default" href="#">Default</a>
                    </div>
                </li>
            </ul>
			<span id="infocurso" class="navbar-text nav-bar-curso" >
			</span>
			<span class="navbar-text" >
                ALUMNO:
			</span>
            <span class="navbar-text nav-bar-usuario" style="margin-right:20px;">
                <?php  echo $_SESSION['usuario']['username'];?>
			</span>
            <a class="btn btn-primary" href="<?php echo site_url('/GestionHome/Logout/') ; ?>" role="button" aria-expanded="false" aria-controls="collapseExample">
                Log Out
            </a>
        </div>
	</nav>

    <main role="main" class="container-fluid">
	    <div class="row" >
        <div class="col col-md-2 main">
			<div id="main">
				<div id="outer-circle">
					<div id="inner-circle">
					<div id="center-circle">
						<div id="content"></div>
					</div>
					</div>
				</div>
			</div>
    	</div>
    	<div class="col-12 col-md-8" >
    	<div id="myerror" style="display:none" class="alert alert-danger text-center" style="margin:15px;" role="alert">No existen informes para el alumno <?php echo $alumno['nombre'] . " " . $alumno['apellido1'] . " ". $alumno['apellido2'] ; ?> </div>
  		<?php foreach($informesalumno as $data){  ?>
			<div class="card card-principal" style="margin:50px">
				<div class="card-header w3-animate-zoom">
					Curso: <?php echo " " . $data["curso"]; ?>
				</div>
				<div class="card-body">
					<h5 class="card-title w3-animate-zoom">Evaluación: <?php echo " " . $data["trimestre"]; ?></h5>
					<a class="btn bg-warning" data-toggle="collapse" href="#collapseEval<?php echo  $data["trimestre"]; ?>" role="button" aria-expanded="false" aria-controls="collapseExample">
						<i class="fa fa-eye"></i>
					</a>
					<div class="collapse" id="collapseEval<?php echo  $data["trimestre"]; ?>">
						<div class="card card-body" style="margin-top:20px;margin-bottom:20px">
						<div class="card bg-light mb-3" >
							<div class="card-body">
							<div class="w3-panel w3-pale-red w3-leftbar w3-border-red ">
							<h5 class="card-title">Informe</h5>
								<?php echo " " . $data["texto"]; ?>
</div>

							</div>
						</div>

						</div>
					</div>

					<a  href="<?php echo site_url('GestionPdf/verpdfamilia/'). $data['idInforme'] ; ?>" class="btn bg-success"><i class="fa fa-file-pdf"></i></a>
				</div>
			</div>
		<?php  }  ?>
	</div>
	</div>
	<div class="col col-md-2 main">
<!-- 	<div class="container-fluid" >
		<div class="sky">
				<div class="sun" style="height:1.5vw:width:1.5vw;" ></div>
				<img class="img-fluid" style="height:3vw" src="https://lh4.googleusercontent.com/-bBB40VF4pGM/VPCtLsmGJ3I/AAAAAAAAAEw/kTbSVtCWqMo/w366-h182-no/pic-car.png"/>
				<div class="rode1"></div>
				<div class="rode2"></div>
			</div>
		</div> -->
	<div>
</div>
	</main>
<!--     <div id="footer">
    <div class="content-wrap">
        <ul class="navigation">
            <li><a href="#about"> <span>© 2018 Copyright: DAVID LAGUNAS.</span></a></li>
            <li><a href="#Contact">w2.dlagunas@infomila.info</a></li>
                </ul>
            </div>
        </div> -->
	<footer class="footer">
      <div class="container">
	   <span>© 2018 Copyright: DAVID LAGUNAS <a style="margin-left:10px" href="<?php echo site_url('/GestionFamilia/Location/') ; ?>" ><i class="fa fa-map"></i></a></span> 
      </div>
    </footer>
		<!-- Bootstrap core JavaScript
    ================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
	

		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
        crossorigin="anonymous"></script>
		<?php if(count($informesalumno)==0){
		echo '<script>$("#myerror").show();
		        setTimeout(function() { $("#myerror").hide(); }, 8000);</script>';
				}
		?>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
        crossorigin="anonymous"></script>
    <script src="<?php echo base_url();?>js/pageFamilia.js">

	</script>
	</body>
	</html>