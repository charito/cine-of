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
			url: 'js/ejemplo_guardarComentario.php',
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

function CargarComentarios()
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
			url: 'js/ejemplo_cargarComentarios.php',
			type: 'post',
			beforeSend: cargando(),
			success: function (response)
			{
				$("#resultado").html(response);
			}

		});
}