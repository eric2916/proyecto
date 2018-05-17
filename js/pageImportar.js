

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