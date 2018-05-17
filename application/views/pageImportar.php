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
		<link rel="icon" href="../../../../favicon.ico">
		<title>WebService Server</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/reset.css">
		<!-- Bootstrap core CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/style.css">
		<link rel="stylesheet" href="<?php echo base_url();?>font-awesome/css/fontawesome-all.css">
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>


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
        <a class="navbar-brand" href="#">GENERADOR DE INFORMES</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
				<?php if($_SESSION['rolmultiple']==true){ echo '<a class="nav-link"   href="' .  site_url("/GestionHome/") . '">Home</a>'; } ?>
                    <!-- <a class="nav-link" href="<?php echo site_url('/GestionHome/'); ?>">Home</a> -->
                </li>
                <li class="nav-item active">
                    <a class="nav-link <?php if($_SESSION['rolmultiple']==false || $_SESSION['rol']==2){ echo 'disabled'; } ?>" href="<?php echo site_url('/GestionImportar/') ; ?>" >Importar <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item ">
                    <a class="nav-link" href="<?php echo site_url('/GestionImportar/MostrarUsuarios'); ?>">usuarios</a>
				</li>
				<li class="nav-item ">
                    <a class="nav-link" href="<?php echo site_url('/GestionImportar/MostrarItems/'); ?>">items</a>
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
			<a class="btn btn-primary" id="abrir" href="#">Curso</a>
            <a class="btn btn-primary" href="<?php echo site_url('/GestionHome/Logout/') ; ?>" role="button" aria-expanded="false" aria-controls="collapseExample">
                Log Out
            </a>
        </div>
    </nav>

    <main role="main" class="container">

    <div class="container">
		
        <div class="row">
             <div class="col">
			 <?php if(isset($error)){
			
					if($error==1){
						echo 	'<div id="myerror" class="alert alert-danger" role="alert">
									ATENCION  <a href="#" class="alert-link">la carga se ha realizado con exito</a>. 
								</div>'; 
					}else if ($error==2){
						echo '<div id="myerror" class="alert alert-danger" role="alert">
								ATENCION  <a href="#" class="alert-link">No se ha subido el archivo al servidor</a>. 
							</div>'; 
					}else if ($error==0){
						echo '<div id="myerror" class="alert alert-danger" role="alert">
								ATENCION  <a href="#" class="alert-link">Error al cargar el archivo</a>. 
							</div>'; 
					}
				}
			?>
            </div>
            <div class="col-6">

            <div id="accordion" class="acordion">
            <div class="card">
                <div class="card-header" id="headingOne">
                <h5 class="mb-0 text-center">
                    <button class="btn btn-link foo" data-toggle="collapse" style="font-size:2.5vw" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Importar Usuarios
                    </button>
                </h5>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body ">
                   Importará los usuarios de un archivo, para el buen funcionamiento de la aplicación se recomienda antes hacer un delete de la Base de datos, de las tablas Informe , Respuestas y Usuarios.
				   <hr>
				   <br>
				   <form action="<?php echo site_url('GestionImportar/ImportarAlumnos/'); ?>" id="myform" class=" justify-content-center" method="POST"  enctype="multipart/form-data">
						<div class="input-group">
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="userfile" name="userfile" required>
								<label class="custom-file-label" for="userfile">Choose file</label>
								</div>
							<div class="input-group-append">
								<button class="btn btn-outline-secondary" type="submit">Button</button>
							</div>
						</div>
					</form>
				</div>
                </div>
            </div>
            <div class="card">
                <div class="card-header text-center" id="headingTwo">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed foo text-justify" style="font-size:2.5vw" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Importar Items
                    </button>
                </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="card-body">
                    Importará los items alojados en un archivo, también se insertará las respuestas correspondientes a estos items, para el buen funcionamiento de la aplicación se recomienda antes hacer un delete de la Base de datos de todas las tablas excepto los tutores los administradores.
					<hr>
				   <br>
					<form action="<?php echo site_url('GestionImportar/ImportarItems/'); ?>" id="myformItem" class=" justify-content-center" method="POST"  enctype="multipart/form-data">
						<div class="input-group">
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="userfile" name="userfile" required>
								<label class="custom-file-label" for="userfile">Choose file</label>
								</div>
								<div class="input-group-append">
								<button class="btn btn-outline-secondary" type="submit">Button</button>
							</div>
						</div>
					</form>
			    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingThree">
                <h5 class="mb-0 text-center">
                    <button class="btn btn-link collapsed foo" data-toggle="collapse" style="font-size:2.5vw" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Borrar Datos
                    </button>
                </h5>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                <div class="card-body">
                Borrará la base datos completamente, excepto los administradores.
				<hr>
				<a class="btn btn-primary" href="<?php echo site_url('/GestionImportar/BorrarItems/') ; ?>" role="button" aria-expanded="false" aria-controls="collapseExample">
                	Borrar Items
            	</a>
                </div>
                </div>
            </div>
            </div>
            </div>
            <div class="col">

            </div>
        </div>
    </div>
	<div id="dialog" title="CURSO ACTUAL">
		<p>Marcar el curso actual.</p>
		<select name="cursos" id="cursos"></select>
		<button type="button" id="btnguardarcursos" class="btn btn-secondary btn-sm">Guardar</button>
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
		<script src="<?php echo base_url();?>js/pageImportar.js">
		</script>
	</body>
	</html>