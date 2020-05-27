$(document).ready(function () {
    alert("HOLA");
    $.ajax({
        type: "post",
        url: "../ajax/procCartelera.php",
        success: function (data) {
			var json = JSON.parse(data);
            console.log(json);
            alert("HOLA");
            cartelera(json);
        }
    });
    function cartelera(json){
        json.forEach(e => {
            ///Construir el dom de la portada
        });
    }
});