
    $( "#myBar" ).hide( );
    $( "#myProgress" ).hide(  );

    var el = document.getElementById("btnImport");
    var el2 = document.getElementById("btnImport2");
    el.addEventListener("click", move1);
    el2.addEventListener("click", move2);



var cursoactual=localStorage.getItem('curso');
console.info(cursoactual);
if(cursoactual!=null){
    $("#infocurso").html("CURSO: "+cursoactual);
}
var years = ["2018", "2019", "2020","2021","2022","2023","2024","2025","2026","2027"];

 $.each(years, function (i, item) {
    $('#cursos').append($('<option>', { 
        value: i,
        text : item 
    }));
});
$("#btnguardarcursos")
.button()
.click(function () {
   localStorage.setItem("curso", $("#cursos option:selected").text());
   $("#dialog").dialog("close");
   $("#infocurso").html("CURSO: "+ $("#cursos option:selected").text());
});

$(function () {
        $("#dialog").dialog({
        autoOpen: false,
        modal: true
        });

        $("#abrir")
        .button()
        .click(function () {
        $("#dialog").dialog("open");
        });
});



function move1() {
    var file = document.getElementById("userfile");
    if(file.files[0]==undefined)return;
    var filename = file.files[0].name;
    console.info(filename);

    console.info('aqui');
    $( "#myBar" ).show( "fast" );
    $( "#myProgress" ).show( "fast" );

    var elem = document.getElementById("myBar");   
    var width = 10;
    var id = setInterval(frame, 10);
    function frame() {
      if (width >= 100) {
        clearInterval(id);
      } else {
        width++; 
        elem.style.width = width + '%'; 
        elem.innerHTML = width * 1  + '%';
      }
    }
  }
  function move2() {
    var file = document.getElementById("userfile2");
    if(file.files[0]==undefined)return;
    var filename = file.files[0].name;
    console.info(filename);

    console.info('aqui');
    $( "#myBar" ).show( "fast" );
    $( "#myProgress" ).show( "fast" );

    var elem = document.getElementById("myBar");   
    var width = 10;
    var id = setInterval(frame, 10);
    function frame() {
      if (width >= 100) {
        clearInterval(id);
      } else {
        width++; 
        elem.style.width = width + '%'; 
        elem.innerHTML = width * 1  + '%';
      }
    }
  }

var tema=localStorage.getItem('tema');
if(tema!=null){
    if(tema=="ocre"){
        $("body").css("background-color","#E3D671");
    }else if(tema=="dark"){
        $("body").css("background-color","#754831");
    }
}
$("a.dropdown-tema-dark")
.click(function () {
   localStorage.setItem("tema", "dark");
   $("body").css("background-color","#754831");
   
});

$("a.dropdown-tema-ocre")
.click(function () {
   localStorage.setItem("tema", "ocre");
   $("body").css("background-color","#E3D671");
});

$("a.dropdown-tema-default")
.click(function () {
   localStorage.setItem("tema", "default");
   $("body").css("background-color","white");
});