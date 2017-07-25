var i = 0;
var ruta_slider1 = new Array();

ruta_slider1[0] = "images/banner_lateral.jpg";
ruta_slider1[1] = "images/banner_lateral2.jpg";
ruta_slider1[2] = "images/banner_lateral3.jpg";

function cambiarImagen()
{
	document.slide.src = ruta_slider1[i];

	if (i < ruta_slider1.length - 1)
		i++;
	else
		i = 0;
	setTimeout("cambiarImagen()", 4000);
}
window.onload = cambiarImagen;
