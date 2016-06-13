
function cargar()
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
				document.getElementById('divResultado').innerHTML=conexion.responseText;
			//debugger;
			}
		}
		conexion.open("GET","cargar.php?var="+id_Peli, true);
		debugger;
		conexion.send();
	}
