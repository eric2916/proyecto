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

		<!-- Custom styles for this template -->
		<style type="text/css">
			body {
                margin-top:5rem;

			}
			.starter-template {
				padding: 3rem 1.5rem;
				text-align: center;
			}
			@keyframes movecar {
    0%      { left: 0px; }
    50%     { left: 60%; }
    100%    { left: 0px; } 
}

    @-webkit-keyframes movecar {
        0%      { left: 0px; }
        50%     { left: 60%; }
        100%    { left: 0px; } 
    }

    @-moz-keyframes movecar {
        0%      { left: 0px; }
        50%     { left: 60%; }
        100%    { left: 0px; } 
    }

.sky {
	margin-top:300px;
    background: #afedf4;    
    margin-bottom: 50px;
    border: 2px solid black;
    overflow: hidden;   /* this keeps car inside sky div */
}

.sky img {
    margin-top: 50px;          
    position: relative;
    display: inline;

    animation: movecar 10s linear 1s infinite alternate; 
        -webkit-animation: movecar 10s ease-in-out 1s infinite alternate;
        -moz-animation: movecar 10s ease-in-out 1a infinite alternate;
}

.sun {
    background: #ffe252;    
    width: 45px;
    height: 45px;
    border: 2px solid black; 
    border-radius: 50px;
    float: left;
    margin-top: 10px;
    margin-left: 10px;
}

.rode1, .rode2 {
    width: 100%;
    height: 20px;
    background: #808080;
    margin: 0;
}

.rode1 {
    border-top: 2px solid #000000;
}

.rode2 {
    border-top: 2px dashed #ffffff;
}




/*   html { 
    overflow-y: scroll;
    -webkit-font-smoothing: antialiased; }



  a {
    color:#fff;
    text-decoration:none;
  }
  a:hover {
    color:#FF5E99;
  }
  a:link { -webkit-tap-highlight-color: #FF5E99; } 

  #main {
  	width: 100px;
  	height: 30px;
  	margin: auto; }

  #outer-circle {
  	-webkit-box-shadow: 0 0 50px 10px #453D9B;
  	-moz-box-shadow: 0 0 50px 10px #453D9B;
  	box-shadow: 0 0 50px 10px #453D9B;
  	border: 10px solid #ECEBFA;
  	border-top-color:#746EBB;
  	margin: 20% auto;
  	text-align:center;
  	background: -webkit-linear-gradient(top, #ffffff 48%, #ecebfa 49%, #ecebfa 51%, #fff 52%);
  	background: -moz-linear-gradient(top, #ffffff 48%, #ecebfa 49%, #ecebfa 51%, #fff 52%);
  	background: linear-gradient(to bottom, #ffffff 48%, #ecebfa 49%, #ecebfa 51%, #fff 52%);
  	width: 220px;
  	height: 220px;
	
  	-webkit-border-radius: 220px;
  	-moz-border-radius: 220px;
  	border-radius: 220px;
	
  	-webkit-animation:turning_cw 5s infinite;
  	-moz-animation:turning_cw 5s infinite;
  	animation:turning_cw 5s infinite;
  	position:relative;
  	opacity: 0.7; }
  	
  #outer-circle:hover {
  	-webkit-box-shadow: 0 0 100px 15px #453D9B;
  	-moz-box-shadow: 0 0 100px 15px #453D9B;
  	box-shadow: 0 0 100px 15px #453D9B; }
  	
  #inner-circle {
  	border: 10px solid #ECEBFA;
  	border-left-color:#746EBB;
  	border-right-color:#746EBB;
	
  	-webkit-transform: rotate(360deg);
  	-moz-transform: rotate(360deg);
  	transform: rotate(360deg);
	
  	position:absolute;
	
  	background: -webkit-linear-gradient(top, #ecebfa 48%, #746EBB 49%, #746EBB 51%, #ECEBFA 52%);
  	background: -moz-linear-gradient(top, #ecebfa 48%, #746EBB 49%, #746EBB 51%, #ECEBFA 52%);
  	background: linear-gradient(to bottom, #ecebfa 48%, #746EBB 49%, #746EBB 51%, #ECEBFA 52%);
	
  	margin: 10px;
  	width: 180px;
  	height: 180px;
	
  	-webkit-border-radius: 180px;
  	-moz-border-radius: 180px;
  	border-radius: 180px;
	
  	-webkit-animation:turning_acw 3s infinite;
  	-moz-animation:turning_acw 3s infinite;
  	animation:turning_acw 3s infinite; }

  #center-circle {
  	border: 10px solid #746EBB;
  	border-bottom-color:#ECEBFA;
  	-webkit-transform: rotate(360deg); 
  	-moz-transform: rotate(360deg); 
  	transform: rotate(360deg); 
  	position:absolute;

  	background: -webkit-linear-gradient(top, #fff 48%, #ECEBFA 49%, #ECEBFA 51%, #fff 52%);
  	background: -moz-linear-gradient(top, #fff 48%, #ECEBFA 49%, #ECEBFA 51%, #fff 52%);
  	background: linear-gradient(to bottom, #fff 48%, #ECEBFA 49%, #ECEBFA 51%, #fff 52%);
	
  	margin: 10px;
  	width: 140px;
  	height: 140px;
	
  	-webkit-border-radius: 140px;
  	-moz-border-radius: 140px;
  	border-radius: 140px;
	
  	-webkit-animation:turning_cw 5s infinite;
  	-moz-animation:turning_cw 5s infinite;
  	animation:turning_cw 5s infinite; }

  #content {
  	position:absolute;
  	top: 10px;
  	left: 10px;
  	width: 120px;
  	height: 120px;
  	-webkit-border-radius: 140px;
  	-moz-border-radius: 140px;
  	border-radius: 140px;
  	background: #2E2A69; 
  	text-align:center;
  	line-height: 120px;
  	font-size: 30px;
  	color:#746EBB;
  	text-shadow: 0 2px 2px #000;
  	font-weight:bold; }

  @-webkit-keyframes aura {
  	0%{
  		text-shadow: 0 2px 2px #000; }
  		
  	50%{
  		text-shadow: 0 10px 10px #000;
  		line-height: 190px; }
  		
  	100%{
  		text-shadow: 0 2px 10px #000; }
  }

  @-webkit-keyframes turning_cw {
  	0%{
  		-webkit-transform: rotate(0deg); }
  	100%{
  		-webkit-transform: rotate(360deg); }
  }
  
  @-webkit-keyframes turning_acw {
  	0%{
  		-webkit-transform: rotate(360deg); }
  	100%{
  		-webkit-transform: rotate(0deg); }
  }

  @-moz-keyframes aura {
  	0%{
  		text-shadow: 0 2px 2px #000; }
  		
  	50%{
  		text-shadow: 0 10px 10px #000;
  		line-height: 190px; }
  		
  	100%{
  		text-shadow: 0 2px 10px #000; }
  }

  @-moz-keyframes turning_cw {
  	0%{
  		-moz-transform: rotate(0deg); }
  	100%{
  		-moz-transform: rotate(360deg); }
  }
  
  @-moz-keyframes turning_acw {
  	0%{
  		-moz-transform: rotate(360deg); }
  	100%{
  		-moz-transform: rotate(0deg); }
  }

  @keyframes aura {
  	0%{
  		text-shadow: 0 2px 2px #000; }
  		
  	50%{
  		text-shadow: 0 10px 10px #000;
  		line-height: 190px; }
  		
  	100%{
  		text-shadow: 0 2px 10px #000; }
  }

  @keyframes turning_cw {
  	0%{
  		transform: rotate(0deg); }
  	100%{
  		transform: rotate(360deg); }
  }
  
  @keyframes turning_acw {
  	0%{
  		transform: rotate(360deg); }
  	100%{
  		transform: rotate(0deg); }
  } */

		</style>

	</head>
	<body>
	<link href="<?php echo base_url(); ?>css/scrolling-nav.css" rel="stylesheet">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">INFORMES DE EVALUACIÓN</a>
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
	    <div class="row">
        <div class="col col-md-2">
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
    	<div class="col-8" >
    	<div id="myerror" style="display:none" class="alert alert-danger text-center" style="margin:15px;" role="alert">No existen informes para el alumno <?php echo $alumno['nombre'] . " " . $alumno['apellido1'] . " ". $alumno['apellido2'] ; ?> </div>
  		<?php foreach($informesalumno as $data){  ?>
			<div class="card" style="margin:50px">
				<div class="card-header">
					Curso: <?php echo " " . $data["curso"]; ?>
				</div>
				<div class="card-body">
					<h5 class="card-title">Evaluación: <?php echo " " . $data["trimestre"]; ?></h5>
					<a class="btn bg-warning" data-toggle="collapse" href="#collapseEval<?php echo  $data["trimestre"]; ?>" role="button" aria-expanded="false" aria-controls="collapseExample">
						<i class="fa fa-eye"></i>
					</a>
					<div class="collapse" id="collapseEval<?php echo  $data["trimestre"]; ?>">
						<div class="card card-body" style="margin-top:20px;margin-bottom:20px">
							<textarea rows="10" readonly >
								<?php echo " " . $data["texto"]; ?>
							</textarea>
						</div>
					</div>

					<a  href="<?php echo site_url('GestionPdf/verpdfamilia/'). $data['idInforme'] ; ?>" class="btn bg-success"><i class="fa fa-file-pdf"></i></a>
				</div>
			</div>
		<?php  }  ?>
	</div>
	</div>
	<div class="col">
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
	   <span>© 2018 Copyright: DAVID LAGUNAS.</span>
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