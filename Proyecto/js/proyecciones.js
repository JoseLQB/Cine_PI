$(document).ready(function () {
    var url = window.location+"";
    var url2=url.split("=");
    $.ajax({
        type: "post",
        url: "../controllers/procProyecciones.php",
        success: function (data) {
            var json = JSON.parse(data);
            console.log(json);
            proyeccionesUser(json);
            proyecciones(json);
        }
    });

    //Convierte un texto de la forma 2017-01-10 a la forma 10/01/2017
    function formatoFecha(fecha){
        return fecha.replace(/^(\d{4})-(\d{2})-(\d{2})$/g,'$3/$2/$1');
    }
    
    //Genera la información de cada proyección que podrán ver todos los usuarios
    function proyeccionesUser(json){
        var li = $("<li>");
        li.attr("class", "my-1 proy").html("<hr><b>Proyecciones:</b>");
        $(".list").append(li);
        json.forEach(e =>{
            if(e.idPelicula ==url2[1]){
                var p = $("<p>");
                p.attr("class", "my-1 proy").html(formatoFecha(e.fechaProyeccion) + ' - <img class="reloj" src="../assets/images/reloj.png" alt=""> - ' + e.horaProyeccion);
                $(li).append(p);

            }
        });
    }

    //Genera la información de cada proyección
    function proyecciones(json) {
        json.forEach(e => {
            if(e.idPelicula ==url2[1]){
                //Información del modal
                var form = $("<form>");
                form.attr("method", "post");
                form.attr("action", "compraForm.php?varID="+e.idPelicula);
                $(".modal-body").append(form);
                var p =$("<p>").html(formatoFecha(e.fechaProyeccion) + ' - <img class="reloj" src="../assets/images/reloj.png" alt=""> - ' + e.horaProyeccion);
                form.append(p);
                var p2 =$("<p>")
                var span = $("<span>");
                form.append(p2);
                p2.append(span);
                var hidden = $("<input>").attr("type", "hidden").attr("value", e.idProyeccion).attr("name", "idPr");
                span.append(hidden);
                var p3 = $("<p>").text("Sala " + e.idSala);
                form.append(p3);
                var p4 = $("<p>");
                form.append(p4);
                var span2 = $("<span>")
                p4.append(span2);
                var input2 = $("<input>").attr("type", "submit").attr("value", "Comprar").attr("name", "comprar");
                span2.append(input2);
                var hr = $("<hr>");
                p4.append(hr)
            }
        });
    }
});