$(document).ready(function () {
    direccion();

    function direccion() {

    var calle = "Calle Ruiz de Alarcón Nº2";
    var ciudad = "Sevilla";
    var codigoPostal ="41007";
    var telefono = "652222545";
    var src = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3169.994079834789!2d-5.972490284735325!3d37.38997227983134!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd126ebafeb76ea1%3A0x85eba24a3ba88e99!2sCalle%20Ruiz%20de%20Alarc%C3%B3n%2C%202%2C%2041007%20Sevilla!5e0!3m2!1ses!2ses!4v1588296880513!5m2!1ses!2ses"

    var svg = '<svg class="bi bi-house-door" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.646 1.146a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5H9.5a.5.5 0 0 1-.5-.5v-4H7v4a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4h3.5V7.707L8 2.207l-5.5 5.5z"/><path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/></svg>'

    arrayDatos = [calle, ciudad, codigoPostal, telefono, src];
        var div1 = $("<div>");
        div1.attr("class", "container");
        $(".py-5").append(div1);
        var div2 = $("<div>");
        div2.attr("class", "row");
        $(div1).append(div2);
        var div3 = $("<div>");
        div3.attr("class", "col-md-4");
        $(div2).append(div3);
        var ad = $("<address>");
        div3.append(ad);
        var st = $("<h4>").text("Cines PI");
        ad.append(st);
        st.after(arrayDatos[0]+"<br>"+arrayDatos[1]+" CP: "+ arrayDatos[2]+"<br>"+"Telefono: "+arrayDatos[3]);
        var ad2 = $("<address>").html("<br><br>");
        div3.append(ad2);
        var st2 = $("<h5>").html("¿Cómo llegar? <img class='bus' src='../assets/images/bus.png'>")
        ad2.append(st2);
        st2.after("Lineas de autobuses :<br>23, 22, 28, 32");

        var div4 = $("<div>");
        div4.attr("class", "col-sm-7");
        div2.append(div4);
        var mapa = $("<iframe>");
        mapa.attr("class", "map").attr("src", arrayDatos[4]).attr("width","600").attr("height","450").attr("frameborder","0").attr("style","border:0;").attr("allowfullscreen","").attr("aria-hidden","false").attr("tabindex","0");
        div4.append(mapa);
    }
});

