function GuardarComentario(comentario,id_perfil,id_Resena)
{
debugger;
	var parametros = 
	{
		"comentario" : comentario,
		"id_perfil"  : id_perfil,
		"id_Resena"  : id_Resena
	};

	$.ajax({

			data: parametros,
			url: 'js/ejemplo_guardarComentarioNoticia.php',
			type: 'post',
			beforeSend: cargando(),
			success: function (response)
			{
				$("#resultado").html(response);
			}

		});
}
function cargando()
	{
		$("#resultado").html("Procesando, espere por favor...")
	}

function CargarcomentarioNoticia()
{
debugger;
	/*var parametros = 
	{
		"comentario" : comentario,
		"id_perfil"  : id_perfil,
		"id_Resena"  : id_Resena
	};*/

	$.ajax({

			//data: parametros,
			url: 'js/cargarcomentarioNoticia.php',
			type: 'post',
			beforeSend: cargando(),
			success: function (response)
			{
				$("#resultado").html(response);
			}

		});
}