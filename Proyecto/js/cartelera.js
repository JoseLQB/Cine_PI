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
        json.forEach(e => {
            var div1 = $("<div>");
            div1.attr("class", "col-sm my-3");
            $(".movie-list").append(div1);
            var div2 = $("<div>");
            div2.attr("class", "card cartel");
            div1.append(div2);
            var a1 = $("<a>");
            a1.attr("href", "compra.php?varID=" + e.idPelicula);
            div2.append(a1);
            var img1 = $("<img>");
            img1.attr("src", e.cartel);
            a1.append(img1);
            var div3 = $("<div>");
            div3.attr("class", "card-body");
            div2.append(div3);
            var h5 = $("<h5>").text(e.titulo+ "(" + e.anEstreno + ")");
            h5.attr("class", "card-title");
            div3.append(h5);
        });
    }
});

