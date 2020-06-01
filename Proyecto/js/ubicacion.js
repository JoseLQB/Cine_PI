$(document).ready(function () {
    ubicacion();











    function ubicacion() {

    var calle = "Calle Ruiz de Alarcón Nº2";
    var ciudad = "Sevilla";
    var codigoPostal ="41007";
    var telefono = "652222545";
    var src = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3169.994079834789!2d-5.972490284735325!3d37.38997227983134!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd126ebafeb76ea1%3A0x85eba24a3ba88e99!2sCalle%20Ruiz%20de%20Alarc%C3%B3n%2C%202%2C%2041007%20Sevilla!5e0!3m2!1ses!2ses!4v1588296880513!5m2!1ses!2ses"

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
        var st = $("<b>").text("Cines PI");
        ad.append(st);
        st.after("<br>"+arrayDatos[0]+"<br>"+arrayDatos[1]+" CP: "+ arrayDatos[2]+"<br>"+"Telefono: "+arrayDatos[3]);
        var div4 = $("<div>");
        div4.attr("class", "col-sm-7");
        div2.append(div4);
        var mapa = $("<iframe>");
        mapa.attr("class", "map").attr("src", arrayDatos[4]).attr("width","600").attr("height","450").attr("frameborder","0").attr("style","border:0;").attr("allowfullscreen","").attr("aria-hidden","false").attr("tabindex","0");
        div4.append(mapa);
    }
});

