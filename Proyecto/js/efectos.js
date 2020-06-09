$(document).ready(function () {
  $(window).scroll(function () {
    if ($("#menu").offset().top > 56) {
      ocultaMenu();
    }
  });

});

//Oculta la barra de menú
function ocultaMenu() {
  var prevScrollpos = window.pageYOffset;
  window.onscroll = function () {
    var currentScrollPos = window.pageYOffset;
    if (prevScrollpos > currentScrollPos) {
      document.getElementById("menu").style.top = "0";
    } else {
      document.getElementById("menu").style.top = "-60px";
    }
    prevScrollpos = currentScrollPos;
  }
}





