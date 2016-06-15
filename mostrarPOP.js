function cargaPOP(id)
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
				document.getElementById('form-content').innerHTML=conexion.responseText;
			debugger;
			}
		}
		conexion.open("GET","assets/popup.php?id="+id, true);
		//debugger;
		conexion.send();
	}
