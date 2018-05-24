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
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Temas</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item dropdown-tema-dark" href="#">Dark</a>
                        <a class="dropdown-item dropdown-tema-ocre" href="#">Ocre</a>
                        <a class="dropdown-item dropdown-tema-default" href="#">Default</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Jasper</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown02">
                        <a class="dropdown-item dropdown-jasper-server" href="http://92.222.27.83:8080/jasperserver/flow.html?_flowId=viewReportFlow&standAlone=true&_flowId=viewReportFlow&ParentFolderUri=%2Fw2-dlagunas&reportUnit=%2Fw2-dlagunas%2Fproyecto&j_acegi_security_check&j_username=w2-dlagunas&j_password=46781187S">JASPER SERVER</a>
                        <a class="dropdown-item dropdown-jasper-php" href="#">JASPER PHP</a>
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

    <main role="main" class="container-fluid">
	    <div class="row">
            <div class="col col-md-2">
	        <div class="ui-widget">
            <form action="<?php echo site_url('GestionHome/filtro'); ?>" method="post">
                <label for="tags">Apellido del alumno: </label>
                <input id="tags" name="inpnombre" class="form-control mb-2 mr-sm-2" >
                <button type="submit" id="btnFiltro" class="btn btn-primary mb-2">Submit</button>
            </form>
        </div>
    </div>
    <div class="col-10" >
	<?php $i=0; ?>
			<?php if (isset($results)) { ?>
			<div class="card-deck">
                <?php foreach ($results as $data) { ?>
                    <?php if(($i%1)==0) echo "</div><div class='card-deck'>"; ?>
                    <?php for($evals=1;$evals<4;$evals++) { ?>   
				
                        <div class="card border-faded card-usuarios-home zoom-usuarios">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <div class="btn-group btn-group-sm" role="group" aria-label="evaluaciones">
                                            <?php if( $evals==1) {  ?>
                                                <?php if($data['total']==0) {  
                                                        $arr=$data['id'] . "x".$evals;
                                                        echo '<a class="btn btn-primary crear-btn" role="button" href="' .site_url('GestionInforme/cargarinforme/'). $arr . '" ><i class="fa fa-plus-circle"></i></a>';
                                                          ?>
                                                <?php } ?>
                                                <?php if($data['total']==1) {  
                                                         $arr=$data['id'] . "x".$evals;
                                                        echo '<a class="btn btn-primary editar-btn" role="button"  href="' .site_url('GestionEditarInforme/cargarinforme/'). $arr . '" ><i class="fa fa-edit"></i></a>';
                                                        echo '<a  href="' .site_url('GestionPdf/verpdf/'). $arr . '" class="btn btn-secondary ver-btn"><i class="fa fa-eye"></i></a>';
                                                          ?>
                                                <?php } ?>
                                                <?php if($data['total']==2) {  
                                                         $arr=$data['id'] . "x".$evals;
                                                        echo '<a class="btn btn-primary editar-btn" role="button" href="' .site_url('GestionEditarInforme/cargarinforme/'). $arr . '" ><i class="fa fa-edit"></i></a>';
                                                        echo '<a  href="' .site_url('GestionPdf/verpdf/'). $arr . '" class="btn btn-secondary ver-btn"><i class="fa fa-eye"></i></a>';
                                                          ?>
                                                <?php } ?>
                                                <?php if($data['total']==3) {  
                                                        $arr=$data['id'] . "x".$evals;
                                                        echo '<a class="btn btn-primary editar-btn" role="button" href="' .site_url('GestionEditarInforme/cargarinforme/'). $arr . '" ><i class="fa fa-edit"></i></a>';
                                                        echo '<a href="' .site_url('GestionPdf/verpdf/'). $arr . '" class="btn btn-secondary ver-btn"><i class="fa fa-eye"></i></a>';
                                                          ?>
                                                <?php } ?>
                                            <?php }  ?>
                                            <?php if( $evals==2) {  ?>
                                                <?php if($data['total']==0) {  
                                                        $arr=$data['id'] . "x".$evals;
                                                        echo '<a class="btn btn-primary crear-btn disabled" role="button" href="' .site_url('GestionInforme/cargarinforme/'). $arr . '" ><i class="fa fa-plus-circle"></i></a>';
                                                         ?>
                                                <?php } ?>
                                                <?php if($data['total']==1) {  
                                                        $arr=$data['id'] . "x".$evals;
                                                        echo '<a class="btn btn-primary crear-btn" role="button" href="' .site_url('GestionInforme/cargarinforme/'). $arr . '" ><i class="fa fa-plus-circle"></i></a>';
                                                         ?>
                                                <?php } ?>
                                                <?php if($data['total']==2) {  
                                                     $arr=$data['id'] . "x".$evals;
                                                        echo '<a class="btn btn-primary editar-btn" role="button" href="' .site_url('GestionEditarInforme/cargarinforme/'). $arr . '" ><i class="fa fa-edit"></i></a>';
                                                        echo '<a href="' .site_url('GestionPdf/verpdf/'). $arr . '" class="btn btn-secondary ver-btn"><i class="fa fa-eye"></i></a>';
                                                        ;  ?>
                                                <?php } ?>
                                                <?php if($data['total']==3) {  
                                                     $arr=$data['id'] . "x".$evals;
                                                        echo '<a class="btn btn-primary editar-btn" role="button" href="' .site_url('GestionEditarInforme/cargarinforme/'). $arr . '" class="btn btn-secondary"><i class="fa fa-edit"></i></a>';
                                                        echo '<a href="' .site_url('GestionPdf/verpdf/'). $arr . '" class="btn btn-secondary ver-btn"><i class="fa fa-eye"></i></a>';
                                                        ;  ?>
                                                <?php } ?>
                                            <?php }  ?>
                                            <?php if( $evals==3) { ?>
                                                <?php if($data['total']==0) {  
                                                     $arr=$data['id'] . "x".$evals;
                                                        echo '<a class="btn btn-primary crear-btn disabled" role="button" href="' .site_url('GestionInforme/cargarinforme/'). $arr . '" class="btn btn-secondary"><i class="fa fa-plus-circle"></i></a>';
                                                          ?>
                                                <?php } ?>
                                                <?php if($data['total']==1) {  
                                                         $arr=$data['id'] . "x".$evals;
                                                        echo '<a class="btn btn-primary crear-btn disabled" role="button" href="' .site_url('GestionInforme/cargarinforme/'). $arr . '" class="btn btn-secondary"><i class="fa fa-plus-circle"></i></a>';
                                                          ?>
                                                <?php } ?>
                                                <?php if($data['total']==2) {  
                                                         $arr=$data['id'] . "x".$evals;
                                                        echo '<a class="btn btn-primary crear-btn" role="button" href="' .site_url('GestionInforme/cargarinforme/'). $arr . '" class="btn btn-secondary"><i class="fa fa-plus-circle"></i></a>';
                                                         ?>
                                                <?php } ?>
                                                <?php if($data['total']=="3") {  
                                                     $arr=$data['id'] . "x".$evals;
                                                        echo '<a class="btn btn-primary editar-btn" role="button" href="' .site_url('GestionEditarInforme/cargarinforme/'). $arr . '" ><i class="fa fa-edit"></i></a>';
                                                        echo '<a href="' .site_url('GestionPdf/verpdf/'). $arr . '" class="btn btn-secondary ver-btn"><i class="fa fa-eye"></i></a>';
                                                       ;  ?>
                                                <?php } ?>
                                          
                                            <?php }  ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <p class="card-text montserratV2">
                                            <i class="fa fa-money" style="color:red" aria-hidden="true"></i>
                                            <?php echo $data['nombre'] . " ". $data['apellido1'] . " " .  $data['apellido2'];?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer clearfix blockquote-footer">
                                EVALUACIÓN <?php echo $evals; ?>
                            </div>
                        </div>
                <?php } ?>
				<?php $i++; ?>
				<?php } ?>
				<?php } else { ?>
				<div><div class="alert alert-danger text-center" style="margin:15px;" role="alert">No se han encontrado resultados</div></div>
				<?php } ?>
            </div>
            <?php if (isset($links)) { ?>
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center text-warning" style="margin:10px;">
					<?php echo $links ?>
				</div>
			</div>
		</div>
		<?php } ?>
		</div>

	<div>
	<div class="col">

	</div>
	</div>
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
		<?php if(isset($error)){
		echo '<script>$("#myerror").show();
		setTimeout(function() { $("#myerror").hide(); }, 5000);</script>';
				}
		?>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
        crossorigin="anonymous"></script>
    <script src="<?php echo base_url();?>js/pageHome.js">

	</script>
	<script>
    var availableTags=new Array();
    $( function() {
        availableTags = [];
        $( "#tags" ).autocomplete({
        source: availableTags
        });
    } );


	myFunction();

        function myFunction() {
                /* 	  var nom = document.getElementById("Nombre").value;
                    var ape1 = document.getElementById("Apellido1").value;
                    var ape2 = document.getElementById("Apellido2").value;
                    var curs = document.getElementById("curso").value;
                    */
                var nom = "";
                var ape1 = "";
                var ape2 = "";
                var curs = "";
                var xhr;
            
            if (window.XMLHttpRequest) { // Mozilla, Safari, ...
                    xhr = new XMLHttpRequest();
                    // creació d'un objecte nou XMLHttpRequest per la majoria de navegadors actuals
            } else if (window.ActiveXObject) { // IE 8 and older
                    xhr = new ActiveXObject("Microsoft.XMLHTTP");
                    // creació d'un objecte ActiveXObject per navegadors IE8 o més antics
            }

            if(!Number.isInteger(curs) ){
                curs="";
            }

            var data = "protocol=1&nombre="+nom+"&apellido1="+ape1+"&apellido2="+ape2+"&curso="+curs;
            console.info('<?php echo site_url('servidorajax'); ?>');
            xhr.open("POST", '<?php echo site_url('servidorajax'); ?>', true); 
                    
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            xhr.send(data);


            xhr.onreadystatechange = display_data;


                function display_data() {
                console.log('state', xhr.readyState)
                if (xhr.readyState == 4) {
                //Comprovem si el valor de la propietat 'readyState' és 4, el que indica que s'ha completat l'operació.
                    if (xhr.status == 200) {
                        var respuesta = xhr.responseText;	
                        if(respuesta.length>0){
                            var obj = JSON.parse(respuesta);
                            
                            for(var i=0;i<obj.length;i++){
                                
                                availableTags.push( obj[i].apellido1 +" "+obj[i].apellido2+" , "+obj[i].nombre );
                            }
                            
                            console.log('xhr.responseText', xhr.responseText);

                        }else{

                        } 
                    } else {

                    //alert('Hi ha algun problema amb la sol·licitud');
                        <?php if(isset($alumnosajax)){ ?>
                         <?php for($i=0;$i<count($alumnosajax);$i++){ ?>
                         
                            <?php echo "availableTags.push('". $alumnosajax[$i] ."')" ; ?>
                         
                         <?php } ?>
                        <?php } ?>

                    }
                }else{ // aquest else és totalment opcional
                        switch (xhr.readyState)
                        {
                        case 0:console.info(' No està inicialitzat l\'objecte');break;
                        case 1:console.info(' S\'ha instanciat l\'objecte');break;
                        case 2:console.info(' S\'està enviant el valor de l\'objecte al servidor');break;
                        case 3:console.info(' S\'estan reben les dades processades del servidor');break;
                        }
                } 
            } 
        }

 
		</script>

		
	</body>
	</html>
