
//console.log("her");
/*$('#myModal').on('shown.bs.modal', function () {
  $('#boton_crearCuenta').focus()
})*/

$('#btn_crearcuenta').click(function(event) {
  
  var usuario = $('#crear_usuario').val();
  var password = $('#crear_password').val();
  var nombre = $('#crear_nombre').val();
  var apellidos = $('#crear_apellidos').val();
  var nacionalidad = $('#crear_nacionalidad').val();

  if(usuario != "" &&
    password != "" &&
    nombre != "" &&
    apellidos != "" &&
    nacionalidad != "")
  {
    $.ajax({
      url: 'crear_usuario.php',
      type: 'POST',
      dataType: 'json',
      data: {
        'usuario' : usuario,
        'password' : password,
        'nombre' : nombre,
        'apellidos' : apellidos,
        'nacionalidad' : nacionalidad
      }
    })
    .done(function(result) {
      console.log(result);
      console.log("success");
      $('#modal_registro').modal('hide');
    })
    .fail(function(error) {
      console.log(error);
      console.log("error");
    });
    
  } else {
    alert("lelna los campos");
  }

});
