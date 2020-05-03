$(document).ready(function () {
    var url = window.location+"";
    var url2=url.split("=");
    $.ajax({
        type: "post",
        url: "../ajax/procProyecciones.php",
        success: function (data) {
            var json = JSON.parse(data);
            console.log(json);
            proyecciones(json);
        }
    });
    function proyecciones(json) {
        json.forEach(e => {
            if(e.idPelicula ==url2[1]){
                var form = $("<form>");
                form.attr("method", "post");
                $(".modal-body").append(form);
                var p =$("<p>").text(e.fechaProyeccion + " " + e.horaProyeccion)
                form.append(p);
                var p2 =$("<p>")
                var span = $("<span>").text("Cantidad ");
                form.append(p2);
                p2.append(span);
                var input = $("<input>").attr("type", "number");
                span.append(input);
                var p3 = $("<p>").text("Sala " + e.idSala);
                form.append(p3);
                var p4 = $("<p>");
                form.append(p4);
                var span2 = $("<span>")
                p4.append(span2);
                var input2 = $("<input>").attr("type", "submit").attr("value", "Comprar");
                span2.append(input2);
                var hr = $("<hr>");
                p4.append(hr)
            }
        });
	}
});