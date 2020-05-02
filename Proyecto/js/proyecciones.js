

$(document).ready(function () {

    $.ajax({
        type: "post",
        url: "../ajax/procProyecciones.php",
        success: function (data) {
            var json = JSON.parse(data);
            proyecciones(json);
        }
    });
    function proyecciones(json) {
        json.forEach(e => {
            var form = $("<form>");
            form.attr("method", "post");
            $(".modal-body").append(form);
            var p =$("<p>").text(e.fechaProyeccion + " " + e.horaProyeccion)
            form.append(p);
            var p2 =$("<p>").text("Cantidad ");
            form.append(p2);


        });







		/*json.forEach(e => {
			var li1=$("<li>").attr("class", "list-group-item");
			ul.append(li1);
			var b = $("<b>").text(e.nombre + ": " + e.precio + "€");
			li1.append(b);
			var li2 =$("<li>").attr("class", "list-group-item").text(e.descripcion);
			ul.append(li2);
			
		});*/

	}

});