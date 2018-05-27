var cursoactual=localStorage.getItem('curso');

if(cursoactual!=null){
    $("#infocurso").html("CURSO: "+cursoactual);
}else{
    var d = new Date();
    var n = d.getFullYear();
    $("#infocurso").html("CURSO: "+n);
}



$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})

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


