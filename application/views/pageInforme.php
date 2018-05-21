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
        <link href="https://fonts.googleapis.com/css?family=Fira+Sans|Lora|Oswald" rel="stylesheet">
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
<!-- 	<link href="<?php echo base_url(); ?>css/scrolling-nav.css" rel="stylesheet"> -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">GENERADOR DE INFORMES</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                <?php if($_SESSION['rolmultiple']==true){ echo '<a class="nav-link"   href="' .  site_url("/GestionHome/") . '">Home</a>'; } ?>
                    <!-- <a class="nav-link" href="<?php echo site_url('/GestionHome/'); ?>">Home</a> -->
                </li>
                </li>
                <li class="nav-item">
				<?php if($_SESSION['rolmultiple']==true || $_SESSION['rol']=="1"){ echo '<a class="nav-link" href='.  site_url('/GestionImportar/') .' >Importar</a>'; } ?>
				
				   <!--  <a class="nav-link <?php if($_SESSION['rolmultiple']==false || $_SESSION['rol']==2){ echo 'disabled'; } ?>" href="<?php echo site_url('/GestionImportar/') ; ?>" >Importar</a> -->
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
    <main role="main" class="container">
            <ul class="list-inline">
                <li class="list-inline-item text-muted"><?php echo $alumno[0]['nombre'] . " " . $alumno[0]['apellido1'] ." ". $alumno[0]['apellido2'] ;  ?> </li>
                <li class="list-inline-item bg-success rounded mr-md-3 pr-1 pl-1"><span><?php echo  " EVAL: " . $eval;  ?> </span> ª</li>
                <li class="list-inline-item"><strong><span id="spncurso"> </span></strong></li>
            </ul>
        <div id="mytable" class="table-responsive" style="<?php if(isset($informeprovisional)){ echo 'display:none'; } ?>">
        <form if="formInforme" action="<?php echo site_url('GestionInforme/generarinforme'); ?>" method="post">
            <table class="table table-hover">
                <caption><?php if(isset($informeprovisional)==false){ echo '<button type="submit" class="btn btn-warning">GUARDAR</button>'; } ?></caption>
                <thead>
                    <tr>
                    <th scope="col" style="width: 25%" class="headeritem" >ITEMS</th>
                    <th scope="col" style="width: 10%" class="headeritem" >Insuficiente</th>
                    <th scope="col" style="width: 10%" class="headeritem" >Necesita Mejorar</th>
                    <th scope="col" style="width: 10%" class="headeritem" >Bien</th>
                    <th scope="col" style="width: 10%" class="headeritem" >Notable</th>
                    <th scope="col" style="width: 10%" class="headeritem" >Excelente</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $flag=0; ?>
                <?php foreach ($items as $data) { ?>
                    <tr>
                    <?php if($flag==0) { ?>
                        <th id="par" colspan="6" style="background-color:#ccffcc" scope="colgroup">ADQUISICIÓN DE HABITOS:</th>
                    <?php } else if($flag==10) { ?> 
                        <th id="par" colspan="6" style="background-color:#ffccb3" scope="colgroup">ACTITUD EN CLASE:</th>
                    <?php } else { ?>   
                    <th scope="row" ><?php echo $data["texto"];  ?></th>
                    <?php for($i=0;$i<5;$i++) { ?>
                        <td><input type="radio" name="radio<?php echo $data["iditem"];  ?>" value="<?php echo ($i+1);  ?>" required data-toggle="tooltip" data-placement="top" title="radio con valor <?php echo ($i+1);  ?>"> </td>
                     <?php } ?>  
                     <?php } ?>  
                     <?php $flag=$flag +1; ?>  
                     </tr>        
                <?php } ?>
                </tbody>
            </table>
            <input type="number" hidden value="" id="curso" name="curso">
            </form>
        </div>
        <section style="<?php if(isset($informeprovisional)==false){ echo 'display:none'; } ?>">
            <form action="<?php echo site_url('GestionInforme/guardarinformerevisado/'); ?>" method="post">
                <div class="form-group">
                    <label for="informeprovisional">Edición texto informe</label>
                    <textarea focus class="form-control" name="informeprovisional" id="informeprovisional"  rows="8" ><?php if(isset($informeprovisional)){ echo $informeprovisional; } ?></textarea>
                </div>
                <?php if(isset($informeprovisional)){ echo '<button type="submit" style="margin-bottom:20px;" class="btn btn-warning">GUARDAR</button>'; } ?>
             </form>
        </section>
    </main>
    <?php if(isset($informeprovisional)){ echo '<script>document.getElementById("informeprovisional").focus();</script>'; } ?>
    

    <div id="dialog" title="ATENCION">
        <p>NO TIENES ALUMNOS ASIGNADOS, O NO HAY ITEMS PARA EL INFORME, CONSULTE CON EL ADMINISTRADOR</p>
    </div>
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
	   <span >© 2018 Copyright: DAVID LAGUNAS.</span>
      </div>
    </footer>
		<!-- Bootstrap core JavaScript
    ================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->

		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
		crossorigin="anonymous"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">   
        <?php if(count($items)==0){

                echo '<script>
                    $("#mytable").hide();
                    $( function() {
                        $( "#dialog" ).dialog({
                        autoOpen: false,
                        show: {
                            effect: "blind",
                            duration: 1000
                        },
                        hide: {
                            effect: "explode",
                            duration: 1000
                        }
                        });
                    
                    
                        $( "#dialog" ).dialog( "open" );
                    
                    } );
                </script>';

            }else{
                
                echo '<script>
                $("#dialog").hide();
                </script>';
            }

        ?>

		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>

		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
		crossorigin="anonymous"></script>



		<script src="<?php echo base_url();?>js/pageInforme.js">
		</script>

		
		<script src="<?php echo base_url();?>jquery_ui/jquery-1.9.1.js"></script>
		<script src="<?php echo base_url();?>jquery_ui/jquery-ui.js"></script>
	</body>
	</html>