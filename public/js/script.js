$(document).ready(menuMovil);
$(document).ready(btnCotizacion);
$(document).ready(btnCotacto);



function menuMovil(){
	$(".icono-menu-movil").click(function(){
		if ($(".navegacion-principal").hasClass("navegacion-principal-activa")) {
			$(".navegacion-principal").removeClass("navegacion-principal-activa");
			$(".icono-menu-movil").removeClass("icono-menu-movil-activo");
			$(".circulo-negro").removeClass("circulo-negro-activo");
			$(".menu-principal, .menu-secundario").fadeOut();
		} else {
			$(".navegacion-principal").addClass("navegacion-principal-activa");
			$(".icono-menu-movil").addClass("icono-menu-movil-activo");
			$(".circulo-negro").addClass("circulo-negro-activo");
			$(".menu-principal, .menu-secundario").fadeIn();
		}
	})
}


function btnCotizacion(){
	$(".btn-uno").click(function(){
		$(".contizacion").fadeIn()
		$(".caja-descripcion-articulo").addClass("caja-descripcion-articulo-fantasma");
	})

	$(".btn-regresar").click(function(){
		$(".contizacion").fadeOut()
		$(".caja-descripcion-articulo").removeClass("caja-descripcion-articulo-fantasma");
	})
}



$(document).on("scroll",function(){
    if($(document).scrollTop()>30){
        $(".header-principal, .pleca-azul").removeClass("large").addClass("small");
        $(".pleca-header").addClass("small");
        $(".logo").addClass("logo-pequeno");
        $(".navegacion-principal").addClass("navegacion-principal-activa");
        $(".pleca-azul").addClass("pleca-azul-pequena");
    } else{
        $(".header-principal, .pleca-azul").removeClass("small").addClass("large");
        $(".logo").removeClass("logo-pequeno");
        $(".pleca-header").removeClass("small");
        $(".navegacion-principal").removeClass("navegacion-principal-activa");
        $(".pleca-azul").removeClass("pleca-azul-pequena");
    }
});



function btnCotacto(){
$('nav .btn-contacto').click(function(e){				
		e.preventDefault();		//evitar el eventos del enlace normal
		var strAncla=$(this).attr('href'); //id del ancla
			$('body,html').stop(true,true).animate({				
				scrollTop: $(strAncla).offset().top
			},1000);
		
	});
}



$(function() {
  $('.btn-horario').hover(function() {
    $('.horario').addClass('horario-activo');
  }, function() {
    // vuelve a dejar el <div> como estaba al hacer el "mouseout"
    $('.horario').removeClass('horario-activo');
  });
});



$(document).ready(function(){
	

var t=setInterval(function(){avanzar();},3000);

	$('#btnAnt').click(function()
	{
		var size = $('.slider').find('.s_element').size();
		$('.slider').find('.s_element').each(
			function(index,value){
				if($(value).hasClass('s_visible'))
				{
					$(value).slideUp();
					$(value).removeClass('s_visible');
					
					if(index==0)
					{
						$($('.slider').find('.s_element').get(size-1)).slideDown();
						$($('.slider').find('.s_element').get(size-1)).addClass('s_visible');
						return false;
					}
					else
					{
						$($('.slider').find('.s_element').get(index-1)).slideDown();
						$($('.slider').find('.s_element').get(index-1)).addClass('s_visible');	
						return false;
					}
				}
		});
	});
	$('#btnSig').click(function()
	{
		var size = $('.slider').find('.s_element').size();
		$('.slider').find('.s_element').each(
			function(index,value){
				if($(value).hasClass('s_visible'))
				{
					$(value).slideUp();
					$(value).removeClass('s_visible');
					
					if(index+1<size)
					{
						$($('.slider').find('.s_element').get(index+1)).slideDown();
						$($('.slider').find('.s_element').get(index+1)).addClass('s_visible');
						return false;
					}
					else
					{
						$($('.slider').find('.s_element').get(0)).slideDown();
						$($('.slider').find('.s_element').get(0)).addClass('s_visible');	
						return false;
					}
				}
		});
	});
	
	
	
});


function avanzar()
{
	var size = $('.slider').find('.s_element').size();
		$('.slider').find('.s_element').each(
			function(index,value){
				if($(value).hasClass('s_visible'))
				{
					$(value).slideUp();
					$(value).removeClass('s_visible');
					
					if(index+1<size)
					{
						$($('.slider').find('.s_element').get(index+1)).slideDown();
						$($('.slider').find('.s_element').get(index+1)).addClass('s_visible');
						return false;
					}
					else
					{
						$($('.slider').find('.s_element').get(0)).slideDown();
						$($('.slider').find('.s_element').get(0)).addClass('s_visible');	
						return false;
					}
				}
		});
}














