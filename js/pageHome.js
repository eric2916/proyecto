var cursoactual=localStorage.getItem('curso');
console.info(cursoactual);
if(cursoactual!=null){
    $("#infocurso").html("CURSO: "+cursoactual);
}



$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})

$.validate({
    lang: 'es',
    modules: 'date, security,location',
    addValidClassOnAll : true,
    validateOnBlur: false, // disable validation when input looses focus
    errorMessagePosition: 'top', // Instead of 'inline' which is default
    scrollToTopOnError: true, // Set this property to true on longer forms
});