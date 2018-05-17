var cursoactual=localStorage.getItem('curso');
console.info(cursoactual);
if(cursoactual!=null){
    $("#infocurso").html("CURSO: "+cursoactual);
}