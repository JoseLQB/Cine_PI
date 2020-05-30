$(document).ready(function () {
    $.ajax({
        type: "post",
        url: "../ajax/procCartelera.php",
        success: function (data) {
			var json = JSON.parse(data);
            console.log(json);
            cartelera(json);
        }
    });

    ///Genera el contenido de la cartelera para la página principal


    function cartelera(json){
        var div1 = $("<div>");
        div1.attr("class", "py-4 fuera");
        $("#centro").append(div1);
        var div2 = $("<div>");
        div2.attr("class", "container");
        div1.append(div2);
        var div12 = $("<div>");
        div12.attr("class", "row recuadro");
        div2.append(div12);
        json.forEach(e=>{
            var div3 = $("<div>");
            div3.attr("class", "col-md-3 p-3");
            div12.append(div3);
            var div4 = $("<div>");
            div4.attr("class", "card box-shadow");
            div3.append(div4);
            var a1 = $("<a>");
            a1.attr("href", "compra.php?varID=" + e.idPelicula);
            div4.append(a1);
            var img1 = $("<img>");
            img1.attr("src", e.cartel);
            img1.attr("class", "card-img-top")
            a1.append(img1);
            var div5 = $("<div>");
            div5.attr("class", "card-body");
            div4.append(div5);
            var h4 = $("<h7>").text(e.titulo + " (" + e.anEstreno + ")");
            div5.append(h4);



            
            
            
        })
    }
});

