
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Movies Free</title>
    <link rel="stylesheet" href="login/css/reset.css">
    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Montserrat:400,700'>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

    <link rel="stylesheet" href="login/css/style.css">
  </head>


<body  BACKGROUND="fondo.png" BGPROPERTIES="fixed ">
<div class="container"  class="login-box">
 
  
     <div class="container">
    <div class="info">
      <h1>Movie</h1><span>Made with <i class="fa fa-heart"></i> by <a href="http://andytran.me">Andy Tran</a></span>
    </div>
  </div>
         
         <div id="resultado" class="form"> 
         <div class="thumbnail"><img src="images/icon/claketa_1.gif" /></div>
         <div class="form">
             <form  method="POST" action="return false" onsubmit="return false">
              <p><input class="form-control"  type="text" value="" id="user" name="user" placeholder="Usuario"></p>
              <p><input class="form-control"  type="password" value="" id="pass" name="pass" placeholder="Password"></p>  <br>
              <div class="col-xs-12">
              <p><button class="btn btn-primary btn-block btn-flat"    onclick="valida(document.getElementById('user').value,document.getElementById('pass').value)">ENTRAR</button></p>
              <p class="message">Already registered? <a href="#">Sign In</a></p>
              </div>
             </form>
         </div>
        </div>
        <script>
        function valida(user, pass)
        {
          $.ajax({
            url:  'validarr.php',
            type: 'POST',
            data: 'user='+user+'&pass='+pass,
            success: function(resp){

              $('#resultado').html(resp);
            }
          });
         }
        </script>
  
      <video id="video" autoplay="autoplay" loop="loop" poster="polina.jpg">
    <source src="http://andytran.me/A%20peaceful%20nature%20timelapse%20video.mp4" type="video/mp4"/>
  </video>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

      <br>
      <br>
  
  </div>

</div>

<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<script src="login/js/index.js"></script>

</body>
</html>
