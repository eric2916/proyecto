var cursoactual=localStorage.getItem('curso');
console.info(cursoactual);
if(cursoactual!=null){
    $("#infocurso").html("CURSO: "+cursoactual);
}



$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})




var cursoactual=localStorage.getItem('curso');
console.info("aqui" + cursoactual);
if(cursoactual!=null){
    $("#curso").val(cursoactual);
}



