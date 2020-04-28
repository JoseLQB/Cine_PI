$(document).on("submit", ".form_registro", function (event) {
    event.preventDefault();
    var $form = $(this);    
    
    var form_datos = {
        nombre: $("input[type='text']",$form).val(),
        email: $("input[type='email']",$form).val(),
        password: $("input[type='password']", $form).val() 
    }
    if(form_datos.nombre.length < 8 ){
        $("#msg_error").text("Tu nombre debe tener más de 8 caracteres.").show();
        return false;        
    }else if(form_datos.email.length < 6 ){
        $("#msg_error").text("Necesitamos un email valido.").show();
        return false;        
    }else if(form_datos.password.length < 8){
        $("#msg_error").text("Tu password debe ser minimo de 8 caracteres.").show();
        return false;   
    }
    $("#msg_error").hide();

    var url_php = "http://localhost/PROYECTO_INTEGRADO/Cine_PI/Proyecto/ajax/procRegistro.php";

    $.ajax({
        type: "POST",
        url: url_php,
        data: form_datos,
        dataType: "json",
        async:true,
    })
    .done(function ajaxDone(res){
        console.log(res);
        if(res.error !== undefined){
            $("#msg_error").text(res.error).show(); //Mostrará el texto "este mail ya existe"
        }
    })
    .fail(function ajaxError(e){
        console.log(e);
    })
    .always(function ajaxAlways(){
        console.log("FIN");
    })
    return false;
    
});


$(document).on("submit", ".form_login", function (event) {
    event.preventDefault();
    var $form = $(this);    
    
    var form_datos = {
        email: $("input[type='email']",$form).val(),
        password: $("input[type='password']", $form).val() 
    }
    if(form_datos.email.length < 6 ){
        $("#msg_error").text("Necesitamos un email valido.").show();
        return false;        
    }else if(form_datos.password.length < 8){
        $("#msg_error").text("Tu password debe ser minimo de 8 caracteres.").show();
        return false;   
    }
    $("#msg_error").hide();

    var url_php = "http://localhost/PROYECTO_INTEGRADO/Cine_PI/Proyecto/ajax/procLogin.php";

    $.ajax({
        type: "POST",
        url: url_php,
        data: form_datos,
        dataType: "json",
        async:true,
    })
    .done(function ajaxDone(res){
        console.log(res);
        if(res.error !== undefined){
            $("#msg_error").html(res.error).show(); //Mostrará el texto "este mail ya existe"
        }
    })
    .fail(function ajaxError(e){
        console.log(e);
    })
    .always(function ajaxAlways(){
        console.log("FIN");
    })
    return false;
    
});