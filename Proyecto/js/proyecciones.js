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

    //Obtiene el precio según el tipo de tarifa
    function getPrecio(codTarifa){
        switch (codTarifa) {
            case "ESPECT":
                return 6
                break;

            case "MATINA":
                return 6;
                break;

            case "NORMAL":
                return 10;
                break;

            case "PAREJA":
                return 4;
                break;

            case "SALA3D":
                return 13;
                break;
                    
            default:
                break;
        }

    }

    //Obtiene el nombre de la tarifa
    function getTarifa(codTarifa){
        switch (codTarifa) {
            case "ESPECT":
                return "Día del espectador"
                break;

            case "MATINA":
                return "Tarifa matinal";
                break;

            case "NORMAL":
                return "Tarifa normal";
                break;

            case "PAREJA":
                return "Día de la pareja";
                break;

            case "SALA3D":
                return "Tarifa 3D";
                break;
                    
            default:
                break;
        }

    }
    


    //Convierte un texto de la forma 2017-01-10 a la forma 10/01/2017
    function formatoFecha(fecha){
        return fecha.replace(/^(\d{4})-(\d{2})-(\d{2})$/g,'$3/$2/$1');
    }

    //Compara las fechas y oculta las que ya se han emitido
    function comparandoFechas(stri){
        var array = stri.split("-");
        var fecha = new Date(array[0], array[1]-1, array[2]);
        var hoy = new Date();
        if(fecha<hoy){
            return true;
        }

    }
    
    //Genera la información de cada proyección que podrán ver todos los usuarios
    function proyeccionesUser(json){
        var li = $("<li>");
        li.attr("class", "my-1 proy").html("<hr><b>Proyecciones:</b>");
        $(".list").append(li);
        json.forEach(e =>{
            if(!comparandoFechas(e.fechaProyeccion)){
                if(e.idPelicula ==url2[1]){
                    var p = $("<p>");
                    p.attr("class", "my-1 proy").html(formatoFecha(e.fechaProyeccion) + ' - <img class="reloj" src="../assets/images/reloj.png" alt=""> - ' + e.horaProyeccion);
                    $(li).append(p);

                }
            }
        });
    }

    //Genera la información de cada proyección
    function proyecciones(json) {
        json.forEach(e => {
            if(!comparandoFechas(e.fechaProyeccion)){
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
                    //Pasamos el código de la tarifa para obtener el precio
                    var p3 = $("<p>").html("Sala " + e.idSala + "<br>" + getTarifa(e.codTarifa)+ " - "+ getPrecio(e.codTarifa)+ "€");
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
            }
        });
    }
});