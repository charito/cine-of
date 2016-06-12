
// Declaro los selects que componen el documento HTML. Su atributo ID debe figurar aqui.

function cargaContenido(id_Peli)
{		var conexion;
	if (window.XMLHttpRequest) {
		conexion = new XMLHttpRequest();
	}else
		{
			conexion = new ActiveXObject("Microsoft.XMLHTTP");
		}
		conexion.onreadystatechange=function() 
		{ 
			if (conexion.readyState==4)
			{
				document.getElementById('divComentarios').innerHTML=conexion.responseText;
			//debugger;
			}
		}
		conexion.open("GET","js/ejemplo_cargarComentarios.php?var="+id_Peli, true);
		//debugger;
		conexion.send();
	}

function guardaContenido(comentario,id_Peli,id_Resena,id_Perfil)
{		
//debugger;
	var conexion2;

	if (window.XMLHttpRequest) {
		conexion2 = new XMLHttpRequest();
	}else
		{
			conexion2 = new ActiveXObject("Microsoft.XMLHTTP");
		}
		conexion2.onreadystatechange=function() 
		{ 
			if (conexion2.readyState==4)
			{
				document.getElementById('divCarga').innerHTML = conexion2.responseText;
			//debugger;
			}
		}
		conexion2.open("GET","js/ejemplo_guardarComentario.php?com="+comentario+"&var="+id_Peli+"&res="+id_Resena+"&per="+id_Perfil, true);
		//cargaContenido(id_Peli);
		//debugger;
		conexion2.send();
		debugger;
	}