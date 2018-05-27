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
		<title>WebService Server</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/reset.css">
		<!-- Bootstrap core CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/style.css">
		<link rel="stylesheet" href="<?php echo base_url();?>font-awesome/css/fontawesome-all.css">
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
<link href="https://fonts.googleapis.com/css?family=Fira+Sans|Lora|Oswald" rel="stylesheet">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

		<!-- Custom styles for this template -->
		<style type="text/css">
			body {
				margin-top:2rem;
			}
			.starter-template {
				padding: 1rem 1.5rem;
				text-align: center;
            }
            .foo{
                font-size:14px;
            }
            @media (max-width: 74.9em) {
				.foo{
                	font-size:14px;
            	}	
			}
			/* LESS THAN 62 */
			@media (max-width: 61.9em) {
				.foo{
                	font-size:14px;
            	}

			}
			/* LESS THAN 48 */
			@media (max-width: 47.9em) {
				.foo{
                	font-size:14px;
            	}
			
			}
			/* LESS THAN 34 */
			@media (max-width: 33.9em) {
				.foo{
					font-size:8px;
				}
			}
		</style>
	</head>
	<body>
	<link href="<?php echo base_url(); ?>css/scrolling-nav.css" rel="stylesheet">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a class="navbar-brand w3-animate-top" href="#">GENERADOR DE INFORMES</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
				<?php if($_SESSION['rolmultiple']==true){ echo '<a class="nav-link"   href="' .  site_url("/GestionHome/") . '">Home</a>'; } ?>
                    <!-- <a class="nav-link" href="<?php echo site_url('/GestionHome/'); ?>">Home</a> -->
                </li>
                <li class="nav-item ">
                    <a class="nav-link <?php if($_SESSION['rolmultiple']==false || $_SESSION['rol']==2){ echo 'disabled'; } ?>" href="<?php echo site_url('/GestionImportar/') ; ?>" >Importar <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item ">
                    <a class="nav-link" href="<?php echo site_url('/GestionImportar/MostrarUsuarios'); ?>">usuarios</a>
				</li>
				<li class="nav-item active">
                    <a class="nav-link" href="<?php echo site_url('/GestionImportar/MostrarItems/'); ?>">items</a>
				</li>
				<li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Temas</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item dropdown-tema-dark" href="#">Dark</a>
                        <a class="dropdown-item dropdown-tema-ocre" href="#">Ocre</a>
                        <a class="dropdown-item dropdown-tema-default" href="#">Default</a>
                    </div>
                </li>
			</ul>
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

    <main role="main" class="container" >
        <div class="row">
             <div class="col">
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
            <?php $i=0; $rols=array("NADA","ADMIN","TUTOR","ALUMNO") ?>
			<?php if (isset($items) && $items!=false ) { ?>
			<div class="card-deck">
				<?php foreach ($items as $data) { ?>
				<?php if(($i%2)==0) echo "</div><div class='card-deck'>"; ?>
				<div class="card border-faded card-usuarios-home zoom-usuarios w3-hover-shadow w3-center" style="margin:5px;margin-bottom :20px;">
					<div class="card-body">
						<div class="row">
							<div class="col-md-6 text-left">
								<h4 class="card-title montserratV2 text-left">
									 <?php echo $data['iditem'] ?>
								</h4>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 text-left">
								<p class="card-text montserratV2">
									<i class="fa fa-quote-left" style="color:lightblue" aria-hidden="true"></i>
                                   <label style="font-family: 'Lora';"> <?php echo $data['texto'] ; ?></label>
                                    <i class="fa fa-quote-right" style="color:lightblue" aria-hidden="true"></i>
                                </p>

							</div>
						</div>
						<div class="row">
							
						</div>
					</div>
					<div class="card-footer clearfix mygradientcarditem">
						<!-- <small class="text-muted"><i class="fa fa-calendar text-danger " aria-hidden="true" ></i><?php echo "&nbsp;" . $data['email'] ?></small> -->
					</div>
				</div>
				<?php $i++; ?>
				<?php } ?>
				</div>
				<?php } else { ?>
					<div class="alert alert-danger text-center"  role="alert">No existen items</div>
				<?php } ?>
			</div>
            
            <div class="col">
            </div>
        </div>
	</main>

	<footer class="footer">
      <div class="container">
	   <span >© 2018 Copyright: DAVID LAGUNAS.</span>
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
		setTimeout(function() { $("#myerror").hide(); }, 2000);</script>';
				}
		?>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
		crossorigin="anonymous"></script>
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
		<script src="<?php echo base_url();?>js/pageMostrarUsuarios.js">
		</script>
	</body>
	</html>