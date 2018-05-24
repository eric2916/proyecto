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
    // creació del mapa, però encara no es dibuixa
    var myOptions = {
        //center: latlon
        zoom: 14, //4,
        mapTypeControl: false,
        //  mapTypeControlOptions:{style: google.maps.MapTypeControlStyle.BUTTON},// {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
        // botons esquerra superior
        navigationControl: true,
        scrollwheel:true,
        navigationControlOptions: {
            style: google.maps.NavigationControlStyle.SMALL
        },
        mapTypeId: google.maps.MapTypeId.ROADMAP // ROADMAP,SATELLITE, HYBRID, TERRAIN
    }

    map = new google.maps.Map(document.getElementById("infoMapa"), myOptions);

    google.maps.event.addListener(map, 'click', function(event){
        this.setOptions({scrollwheel:true});
      });
    // si el navegador pemet geolocalització, fer la petició
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


    // Dibuixar mapa 
    // configuració d'un marcador a mostrar en el mapa
    // creació de la posició on hi haurà el marcador
    var lat = "41.583526";
    var longi = "1.602078";
    var pos = new google.maps.LatLng(lat, longi);
    // modificació d'alguns paràmetres / opcions del mapa          
    map.setCenter(pos);
    map.setZoom(14);

    // afegir un pop-up amb la informació que ens interessi
    infowindow = new google.maps.InfoWindow({
        content: "<strong>Ara amb marcador del punt exacte!</strong>"
    });

    //  infowindow = new google.maps.InfoWindow({});

    // creació de la marca
    var marker = new google.maps.Marker({
        position: pos,
        map: map,
        title: "Ets aquí"
    });
    /*
              google.maps.event.addListener(marker, 'click', function() {
                infowindow.open(map,marker);
              });
          */
    // Aquí sota: mètode per visualitzar el mapa, però que ocupa tota la finestra, millor generar nova finestra 
    //geo_position_js.showMap(p.coords.latitude,p.coords.longitude);

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