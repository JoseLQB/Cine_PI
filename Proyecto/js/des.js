$(document).ready(function(){

	$(window).scroll(function(){
		if( $(this).scrollTop() > 0 ){
			$('navbar').addClass('header2');
		} else {
			$('navabar').removeClass('header2');
		}
	});

});