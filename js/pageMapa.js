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



// MAPA

var infowindow;
var map;
window.addEventListener('load', function() {

    var myOptions = {

        zoom: 14, 
        mapTypeControl: false,

        navigationControl: true,
        scrollwheel:true,
        navigationControlOptions: {
            style: google.maps.NavigationControlStyle.SMALL
        },
        mapTypeId: google.maps.MapTypeId.ROADMAP 
    }

    map = new google.maps.Map(document.getElementById("infoMapa"), myOptions);

    google.maps.event.addListener(map, 'click', function(event){
        this.setOptions({scrollwheel:true});
      });

    if (geo_position_js.init()) {
        geo_position_js.getCurrentPosition(success_callback, geoKO, {
            enableHighAccuracy: true
        });
    } else {
        alert("La Geolocalització ara no està disponible");
    }
});

function success_callback(p) {
    var t = document.createTextNode('Estàs a la següent posició geogràfica: latitud=' + p.coords.latitude.toFixed(6) + ' i longitud=' + p.coords.longitude.toFixed(6))



    var lat = "41.583526";
    var longi = "1.602078";
    var pos = new google.maps.LatLng(lat, longi);
       
    map.setCenter(pos);
    map.setZoom(14);


    infowindow = new google.maps.InfoWindow({
        content: "<strong>Ara amb marcador del punt exacte!</strong>"
    });


    var marker = new google.maps.Marker({
        position: pos,
        map: map,
        title: "Ets aquí"
    });


    infowindow.open(map,marker);
    setTimeout(tancar, 2000)
}

function tancar() {
    infowindow.close();
}

function geoKO(error) {
    var sms = "Codi d'error: " + error.code + ", AVÍS: ";
    switch (error.code) {
        case error.PERMISSION_DENIED:
            sms = "L'usuari ha denegat la sol·licitud per Geolocalització"
            break;
        case error.POSITION_UNAVAILABLE:
            sms = "Informació sobre Localització inaccessible"
            break;
        case error.TIMEOUT:
            sms = "La sol·licitud per aconseguir la ubicació de l'usuari ha caducat"
            break;
        case error.UNKNOWN_ERROR:
            sms = "S'ha produït un error desconegut"
            break;
    }
    var t = document.createTextNode(sms);
}