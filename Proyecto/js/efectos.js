$(document).ready(function () {
    $(window).scroll(function() {
        if ($("#menu").offset().top > 56) {
            ocultaMenu();
        }
      });
    $("#enviar").click(function(){
      sendMail()
    });
    
});

//Oculta la barra de menú
function ocultaMenu(){
    var prevScrollpos = window.pageYOffset;
    window.onscroll = function() {
      var currentScrollPos = window.pageYOffset;
      if (prevScrollpos > currentScrollPos) {
        document.getElementById("menu").style.top = "0";
      } else {
        document.getElementById("menu").style.top = "-50px";
      }
      prevScrollpos = currentScrollPos;
    }
}

//Enviar mail

function sendMail() {
  alert("hi");
  var mail = document.getElementById("correo").value;
  var link = "mailto:cinespipsur@gmail.com"
           + "?cc=" + mail;
           + "&subject=" + escape("This is my subject")
           + "&body=" + escape(document.getElementById('text').value)
  ;

  window.location.href = link;
}


