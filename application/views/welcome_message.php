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
		<link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/style.css">
		<link rel="stylesheet" href="<?php echo base_url();?>css/animate.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<link rel="stylesheet" href="<?php echo base_url();?>font-awesome/css/fontawesome-all.css">
		<link href="https://fonts.googleapis.com/css?family=Fira+Sans|Lora|Oswald" rel="stylesheet">
		<!-- Custom styles for this template -->
		<style type="text/css">
			body {
				margin-top:2rem;
			}
			.starter-template {
				padding: 0.5rem 1.5rem;
				text-align: center;
			}


		</style>
	</head>
	<body style="background-image: url('<?php echo base_url(); ?>uploads/photo_bg2.jpg');">
	<link href="<?php echo base_url(); ?>css/scrolling-nav.css" rel="stylesheet">
	<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">GENERADOR DE INFORMES</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

       
    </nav>

    <main role="main" class="container" >
	<div class="container">
  <div class="row">
    <div class="col">

    </div>
    <div class="col-6" >
	<div class="login-box animated fadeInUp">
				<div class="box-header">
					<h2>Log In</h2>
				</div>
	<form action="<?php echo site_url('Welcome/checkUsuarioForm/'); ?>" id="myformlogin" class=" justify-content-center" method="POST">
		<?php if(isset($error)){
		echo '<div id="myerror" class="alert alert-danger" role="alert">
				El usuario introducido  <a href="#" class="alert-link">NO EXISTE</a>. 
		</div>'; 

				}
		?>
		<div class="form-group row">
			<div class="col-sm-10 col-md-12">
				<label for="login">Login:</label>
				<div class="input-group mb-2">
					<div class="input-group-prepend">
						<div class="input-group-text">*</div>
					</div>
					<input type="text" id="login" name="login" class="form-control" tabindex="8" aria-labelledby="thelogin" data-validation="custom length"
						data-validation-regexp="^([a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+)$"
						data-validation-length="2-12" data-toggle="tooltip" data-placement="right" data-validation-error-msg="<a href='#login'>El login no tiene la longitud adequada o su formato es incorrecto</a>"
						title="Introduzca el login">
				</div>
				<small id="thelogin" class="form-text text-muted">utiliza el username del usuario.</small>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-sm-10 col-md-12">
				<label for="pass_confirmation">Password :</label>
				<div class="input-group mb-2">
						<div class="input-group-prepend">
							<div class="input-group-text">*</div>
						</div>
					<input name="pass_confirmation"  id="pass_confirmation" data-validation="length" data-validation-length="4-12" title="Introduzca password" class="form-control" tabindex="9" aria-labelledby="thepass_confirmation"  data-toggle="tooltip" data-placement="right" data-validation-error-msg="<a href='#pass_confirmation'>Formato Password incorrecto</a>"
						title="Introduzca verificacion de password">
				</div>
				<small id="thepass_confirmation" class="form-text text-muted">Es imprescindible escribir el password.</small>
			</div>
		</div>
			<input type="submit" class="formButton btn btn-primary mb-2" tabindex="12"></input>
		</form>
			</div>
    </div>
    <div class="col">

    </div>
  </div>
</div>
	</main>
	<footer class="footer">
      <div class="container">
	   <span>© 2018 Copyright: DAVID LAGUNAS.</span>
      </div>
    </footer>
		<!-- Bootstrap core JavaScript
    ================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
        crossorigin="anonymous"></script>
		<?php if(isset($error)){
		echo '<script>$("#myerror").show();
		setTimeout(function() { $("#myerror").hide(); }, 5000);</script>';
				}
		?>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
        crossorigin="anonymous"></script>
    <script src="<?php echo base_url();?>js/welcome_message.js">

    </script>
	</body>
	</html>
