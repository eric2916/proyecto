console.info("hello world");
$(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })

var cursoactual=localStorage.getItem('curso');
console.info(cursoactual);
if(cursoactual!=null){
    $("#spncurso").html(""+cursoactual);
    $("#curso").val(""+cursoactual);
}else{
  var d = new Date();
  var n = d.getFullYear();
  $("#spncurso").html(""+n);
  $("#curso").val(""+n);
}