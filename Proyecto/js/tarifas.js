//Creación del contenido de información para las tarifas

$(document).ready(function(){

	$.ajax({
		type: "post",
		url: "../ajax/procTarifas.php",
		success: function (data) {
			var json = JSON.parse(data);
			infoTarifas(json);
		}
	});

	//Devuelve el contenido ordenado del json recibido
	function infoTarifas(json){
		var div1 = $("<div>");
		div1.attr("class", "container");
		$("section").append(div1);
		var div2 =$("<div>");
		div2.attr("class", "row");
		div1.append(div2);
		var div3 =$("<div>").attr("class", "col-md-6");
		div2.append(div3);
		var h3 = $("<h3>").text("Tarifas");
		div3.append(h3);
		var div4 =$("<div>").attr("class", "col-md-6");
		div2.append(div4);
		var ul =$("<ul>").attr("class", "list-group");
		div4.append(ul);
		json.forEach(e => {
			var li1=$("<li>").attr("class", "list-group-item");
			ul.append(li1);
			var b = $("<b>").text(e.nombre + ": " + e.precio + "€");
			li1.append(b);
			var li2 =$("<li>").attr("class", "list-group-item").text(e.descripcion);
			ul.append(li2);
			
		});

	}

});