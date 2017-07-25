// JavaScript Document
/*Validacion para el formulario de registro de compradores*/
function validacion() 
{ 
 /*Creamos la variable global de errores*/
 var errores = "";
 /*Creamos una variable booleana para ver si retorna errores o no*/
 var bolfallo = true;
  //Primero obtenemos los valores con los que vamos a trabajar
  var usuario = document.getElementById("usuario").value;
  var contrasena = document.getElementById("contrasena").value;
  var nombre = document.getElementById("nombre").value;
  var apellidos = document.getElementById("apellidos").value;
  var mail = document.getElementById("mail").value;
  var tlf = document.getElementById("tlf").value;
  /*Primero reseteo los campos por si ha habido fallos anteriormente*/
  document.getElementById("usuario").className="noError";
  document.getElementById("contrasena").className="noError";
  document.getElementById("nombre").className="noError";
  document.getElementById("apellidos").className="noError";
  document.getElementById("mail").className="noError";
  document.getElementById("tlf").className="noError";
  //Validacion del campo usuario
  if (textoVacio(usuario)==false) {
    alert("USUARIO VACIO");
    errores+= "Error en el nombre de usuario<br />";
    document.getElementById('usuario').focus();
    bolfallo = false;
    document.getElementById("usuario").className="error";
  }
  //Validacion del campo contraseña
  if (textoVacio(contrasena)==false) {
  	errores+= "Error la contraseña</br>";
  	document.getElementById('contrasena').focus();
    bolfallo = false;
    document.getElementById("contrasena").className="error";
  }
  //Validacion del campo nombre
  if (textoVacio(nombre)==false) {
  	errores+= "Error en el nombre</br>";
  	document.getElementById('nombre').focus();
    bolfallo = false;
    document.getElementById("nombre").className="error";
  }
   //Validacion del campo apellidos
   if(textoVacio(apellidos)==false) {
     errores+= "Error en el apellido</br>";
     if(bolfallo==true) document.getElementById('apellidos').focus();
     bolfallo = false;
     document.getElementById("apellidos").className="error";
   }
   //Validacion del campo email
   if(textoVacio(mail)==false || compruebaMail(mail)==false){
     if(textoVacio(mail)==false)  errores+= "Debe de insertar su E-mail en este campo.</br>";
     else if(compruebaMail(mail)==false) errores += "Debe de introducir un E-mail correcto</br>";
     if(bolfallo==true) document.getElementById('mail').focus();
     document.getElementById("mail").className="error";
     bolfallo = false;  
   }
   /*Validacion del campo telefono*/
   if(textoVacio(tlf)==false || validaTelefono(tlf)==false)
   {
    errores+= "El telefono no es valido</br>";
    if(bolfallo==true) document.getElementById('tlf').focus();
    document.getElementById("tlf").className="error";
    bolfallo = false; 
  }
  // Si el script ha llegado a este punto, todas las condiciones
  // se han cumplido, por lo que se devuelve el valor true
  if(bolfallo==false){
    crearErrores(errores);
  }
  /*Si todos los datos son correctos saca la ventana de confirmacion*/
  if(bolfallo==true){
   return true;
 }
 return false;
}

/*
* Creador de los errores del DOM
*
*
*/
function crearErrores(errores)
{
	//Primeramente obtengo el contenedor en la variable division, despues lo limpio con innerHTML=""
	var division = document.getElementById("contenedorerrores");
	division.innerHTML=""+errores;
}

/*
* Texto vacio
*
*
*/
function textoVacio(texto)
{
	if(caracteresMaximos(texto,8000)==false){ 
   return false;
 }
 if (texto == null || texto.length == 0 || /^\s+$/.test(texto) ){
  return false;
}
return true;
}

/*Funcion para saber si es un numero o no*/
function esNumero(texto)
{
	/*Si el valor es un numero retorna true, en caso contrario retorna falso, esta funcion esta en libros web y dice que javascript se encarga de tener en cuenta los decimales, signos etc.*/
	if ( isNaN(texto)) return false;
	return true;
}


function compruebaMail(texto){
	/*Primeramente compruebo que no se pase de 60 caracteres, ya que se podria inyectar codigo malicioso
	*/
	if(caracteresMaximos(texto,60)==false){ 
   return false;
 }
 /*Primeramente de 1 a x caracteres, despues debe contener un arroba, despues contiene un numero de caracteres no definido con informacion del subdominio y finalmente lleva de 2 o mas , finalmente test mail comprueba dicha expresion regular*/
 if (/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.([a-zA-Z]{2,4})+$/.test(texto)){
  return true;
} else {
  return false;
}
}

function caracteresMaximos(texto, numero){
	if(texto.length>numero){ 
   alert('A excedido el maximo numero de caracteres permitidos para este campo');
   return false;
 }
 else return true;
}

/*Funcion para validar el telefono 9 digitos numerico o un simbolo + seguido por 11 digitos numericos*/
function validaTelefono(texto){
	if(texto.length==9 && esNumero(texto)==true) return true;
	else if(texto.length==12 && /^\+\d{11}$/.test(texto))	return true;
	else return false;
}

/*Al limpiar el formulario */
function reseteaError(){
	var division = document.getElementById("contenedorerrores");
	division.innerHTML="";
}
/*Funcion limitadora de */
function limita(area_texto,max)
{
 if(area_texto.value.length>=max){area_texto.value=area_texto.value.substring(0,max);}
}

function validarComentario(formulario)
{
	if(formulario.comentario.value.length==0 || formulario.comentario.value.length==null || /^\s+$/.test(formulario.comentario.value)) { //comprueba que no esté vacío
   formulario.comentario.focus();   
   alert("Debes de escribir algo antes de enviar"); 
			return false; //devolvemos el foco
    }
  }

//Validacion para el formulario de discos
function validacionDiscos() 
{ 
 /*Creamos la variable global de errores*/
 var errores = "";
 /*Creamos una variable booleana para ver si retorna errores o no*/
 var bolfallo = true;
  //Primero obtenemos los valores con los que vamos a trabajar
  var insertatitulo = document.getElementById("insertatitulo").value;
  var insertaprecio = document.getElementById("insertaprecio").value;
  var insertaartista = document.getElementById("insertaArtista").value;
  var imagen = document.getElementById("imagen").value;
  var cancion = document.getElementById("cancion1").value;
  
  //Validacion del campo usuario
  if (textoVacio(insertatitulo)==false) {
    errores+= "(Titulo)";
    if(bolfallo==true)document.getElementById('insertatitulo')
      bolfallo = false;
  }
  if (textoVacio(insertaprecio)==false) {
    errores+= "(Precio)";
    if(bolfallo==true)document.getElementById('insertaPrecio')
      bolfallo = false;
  }

  if (textoVacio(insertaprecio)==true) {
    if(esNumero(insertaprecio)==false){
      errores+= "(Precio debe ser un numero)";
      if(bolfallo==true)document.getElementById('insertaPrecio')
        bolfallo = false;
    }
  }

  if (textoVacio(insertaartista)==false) {
    errores+= "(Artista)";
    if(bolfallo==true)document.getElementById('insertaartista')
      bolfallo = false;
  }
  if (textoVacio(imagen)==false) {
    errores+= "(URL completa imagen)";
    if(bolfallo==true)document.getElementById('imagen')
      bolfallo = false;
  }
  if (textoVacio(cancion)==false) {
    errores+= "(Inserrte al menos una canción)";
    if(bolfallo==true)document.getElementById('cancion')
      bolfallo = false;
  }
  // Si el script ha llegado a este punto, todas las condiciones
  // se han cumplido, por lo que se devuelve el valor true
  if(bolfallo==false){
   alert('Los siguiente campos son obligatorios por favor rellenelos: '+errores);
   return false;
 }
 /*Si todos los datos son correctos saca la ventana de confirmacion*/
 if(bolfallo==true){
  return true;
}
}

function validacionDiscosEditados() 
{ 
 /*Creamos la variable global de errores*/
 var errores = "";
 /*Creamos una variable booleana para ver si retorna errores o no*/
 var bolfallo = true;
  //Primero obtenemos los valores con los que vamos a trabajar
  var insertatitulo = document.getElementById("insertatitulo").value;
  var insertaprecio = document.getElementById("insertaprecio").value;
  var insertaartista = document.getElementById("insertaArtista").value;
  var imagen = document.getElementById("imagen").value;
  
  //Validacion del campo usuario
  if (textoVacio(insertatitulo)==false) {
    errores+= "(Titulo)";
    if(bolfallo==true)document.getElementById('insertatitulo')
      bolfallo = false;
  }
  if (textoVacio(insertaprecio)==false) {
    errores+= "(Precio)";
    if(bolfallo==true)document.getElementById('insertaPrecio')
      bolfallo = false;
  }

  if (textoVacio(insertaprecio)==true) {
    if(esNumero(insertaprecio)==false){
      errores+= "(Precio debe ser un numero)";
      if(bolfallo==true)document.getElementById('insertaPrecio')
        bolfallo = false;
    }
  }

  if (textoVacio(insertaartista)==false) {
    errores+= "(Artista)";
    if(bolfallo==true)document.getElementById('insertaartista')
      bolfallo = false;
  }
  if (textoVacio(imagen)==false) {
    errores+= "(URL completa imagen)";
    if(bolfallo==true)document.getElementById('imagen')
      bolfallo = false;
  }
  // Si el script ha llegado a este punto, todas las condiciones
  // se han cumplido, por lo que se devuelve el valor true
  if(bolfallo==false){
   alert('Los siguiente campos son obligatorios por favor rellenelos: '+errores);
   return false;
 }
 /*Si todos los datos son correctos saca la ventana de confirmacion*/
 if(bolfallo==true){
  return true;
}
}

function validacionUsuario() 
{ 
 /*Creamos la variable global de errores*/
 var errores = "";
 /*Creamos una variable booleana para ver si retorna errores o no*/
 var bolfallo = true;
  //Primero obtenemos los valores con los que vamos a trabajar
  var contrasena = document.getElementById("contrasena").value;
  var nombre = document.getElementById("nombre").value;
  var apellidos = document.getElementById("apellidos").value;
  var tlf = document.getElementById("tlf").value;
  var mail = document.getElementById("mail").value;
  
  //Validacion del campo usuario
  if (textoVacio(contrasena)==false) {
    errores+= "(Contraseña)";
    if(bolfallo==true)document.getElementById('contrasena')
      bolfallo = false;
  }
  if (textoVacio(nombre)==false) {
    errores+= "(Nombre)";
    if(bolfallo==true)document.getElementById('nombre')
      bolfallo = false;
  }

  if(textoVacio(mail)==false || compruebaMail(mail)==false){
   if(textoVacio(mail)==false)  errores+= "Debe de insertar su E-mail";
   else if(compruebaMail(mail)==false) errores += "Debe de introducir un E-mail correcto";
   if(bolfallo==true) document.getElementById('mail');
   bolfallo = false;  
 }

 if(textoVacio(tlf)==false || validaTelefono(tlf)==false)
 {
  errores+= "El telefono no es valido";
  if(bolfallo==true) document.getElementById('tlf');
  bolfallo = false; 
}

if (textoVacio(apellidos)==false) {
  errores+= "(Apellidos)";
  if(bolfallo==true)document.getElementById('apellidos');
  bolfallo = false;
}

  // Si el script ha llegado a este punto, todas las condiciones
  // se han cumplido, por lo que se devuelve el valor true
  if(bolfallo==false){
   alert('Los siguiente campos son obligatorios por favor rellenelos: '+errores);
   return false;
 }
 /*Si todos los datos son correctos saca la ventana de confirmacion*/
 if(bolfallo==true){
  return true;
}
}