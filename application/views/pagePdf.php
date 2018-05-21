<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<!DOCTYPE html>
	<html lang="en">
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
		<link href="https://fonts.googleapis.com/css?family=Fira+Sans|Lora|Oswald|Montserrat" rel="stylesheet">

		<!-- Custom styles for this template -->
		<style type="text/css">
			body {
				margin-top:5rem;
			}
			.starter-template {
				padding: 3rem 1.5rem;
				text-align: center;
			}
			

		</style>

	</head>
	<body>
	<link href="<?php echo base_url(); ?>css/scrolling-nav.css" rel="stylesheet">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">GENERADOR DE INFORMES</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
				<?php if($_SESSION['rolmultiple']==true || $_SESSION['rol']=="1"){ echo '<a class="nav-link" href='.  site_url('/GestionImportar/') .' >Importar</a>'; } ?>
				   <!--  <a class="nav-link <?php if($_SESSION['rolmultiple']==false || $_SESSION['rol']==2){ echo 'disabled'; } ?>" href="<?php echo site_url('/GestionImportar/') ; ?>" >Importar</a> -->
                </li>
            </ul>
			<span id="infocurso" class="navbar-text nav-bar-curso" >
			</span>
			<span class="navbar-text" >
                USUARIO:
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
	   <span>© 2018 Copyright: DAVID LAGUNAS.</span>
      </div>
    </footer>
		<!-- Bootstrap core JavaScript
    ================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
        crossorigin="anonymous"></script>

	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
        crossorigin="anonymous"></script>
	</body>
	</html>
