<?php
    require_once("top-header.php");
    require_once("funciones.php");


$id_Perfil=$_SESSION['id_usuario'];
$xc = conectar();
$sql1="SELECT * FROM dbcine.perfil WHERE id_Perfil='$id_Perfil'";
$res1=mysqli_query($xc,$sql1);
$rowPerfil=mysqli_fetch_array($res1);
$nombre_Perfil=$rowPerfil[3];
$apellido_Perfil=$rowPerfil[4];
$nacionalidad_Perfil=$rowPerfil[5];
$categoria_Perfil=$rowPerfil[7];
$foto_Perfil=$rowPerfil[8];
$informacion_Perfil=$rowPerfil[9];


$sql2="SELECT * FROM dbcine.perfil_logros where id_Perfil ='$id_Perfil'";
$res2=mysqli_query($xc,$sql2);
$rowLogroPerfil=mysqli_fetch_array($res2);
$categoria_id_Logros= $rowLogroPerfil[1];


$sql3="SELECT id_Logros,nombre_Logro,imagen_Logro,desc_Logro,recompensa_Logro from dbcine.perfil natural join dbcine.perfil_logros natural join dbcine.logros where dbcine.perfil.id_Perfil =$id_Perfil";
$res3=mysqli_query($xc,$sql3);
$rowLogrosPerfil=mysqli_fetch_array($res3);
$nombre_Logro= $rowLogrosPerfil[1];
$imagen_Logro= $rowLogrosPerfil[2];
$decripcion_Logro= $rowLogrosPerfil[3];
$recompensa_Logro= $rowLogrosPerfil[4];


desconectar($xc);
 ?>
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/freelancer.css" rel="stylesheet">

    <!-- Header -->
    <header>
    <div class="menu">
                <ul>
                    <li><a href="index.php"><div class="hm"><i class="home1"></i><i class="home2"></i></div></a></li>
                    <li><a href="videos.php"><div class="video"><i class="videos"></i><i class="videos1"></i></div></a></li>
                    <li><a class="active" href="reviews.php"><div class="cat"><i class="watching"></i><i class="watching1"></i></div></a></li>
                    <li><a href="404.php"><div class="bk"><i class="booking"></i><i class="booking1"></i></div></a></li>
                    <li><a href="contact.php"><div class="cnt"><i class="contact"></i><i class="contact1"></i></div></a></li>
                </ul>
            </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                <div class="perfil">
                    <img class="img-responsive" src="data:image/jpg;base64,<?php echo base64_encode($foto_Perfil);?>" width="300px">
                    </div>
                    <div class="intro-text">
                        <h1 class="span" name="nombre_apellido_Perfil"><?php echo $nombre_Perfil." ".$apellido_Perfil; ?></h1>
                        <h2 class="" name="nacionalidad_Perfil" > Nacionalidad: <?php echo $nacionalidad_Perfil;  ?>  </h2>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Portfolio Grid Section -->
    <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Logros</h2>
                    <hr class="star-primary">
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4 portfolio-item">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div> <div class="perfil">
                         <!-- <a href="#portfolioModal1" class="portfolio-link" data-toggle="modal">
                        <img class="img-responsive" src="data:image/jpg;base64,<?php echo base64_encode($imagen_Logro);?>" width="300px">
                          </a> -->
                         <?php 
                         $num = 1;
                          echo "<img href=#portfolioModal1 class=portfolio-link data-toggle=modal src=data:image/jpg;base64,"; echo base64_encode($rowLogrosPerfil['imagen_Logro']);  echo " class= img-responsive alt= />";
                  // $nom1= $rowLogrosPerfil['nombre_Logro'];

                           while ($rowLogrosPerfil=mysqli_fetch_array($res3)) {
if ($num%2==0) {
    
    # code...
}
                            echo "<img href=#portfolioModal";echo $rowLogrosPerfil['id_Logros']; echo" class=portfolio-link data-toggle=modal src=data:image/jpg;base64,"; echo base64_encode($rowLogrosPerfil['imagen_Logro']);  echo " class= img-responsive id=";echo $rowLogrosPerfil['id_Logros']; echo "alt= />";
echo $num;
$num=$num+1;                       //echo $rowLogrosPerfil['imagen_Logro'];
                        } 


                           ?>
                           <div>
                </div>
            </div>
        </div>


    </section>

    <!-- About Section -->
    <section class="success" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Sobre mi</h2>
                    <hr class="star-light">
                </div>
            </div>
            <div class="row">
                    <div class="col-lg-12 text-center">
                    <p class="" name="informacion_Perfil" ><?php
                     echo $informacion_Perfil;  ?> </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h3>Contactame</h3>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                    <form name="sentMessage" id="contactForm" novalidate>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Nombre</label>
                                <input type="text" class="form-control" placeholder="Name" id="name" required data-validation-required-message="Please enter your name.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Email</label>
                                <input type="email" class="form-control" placeholder="Email Address" id="email" required data-validation-required-message="Please enter your email address.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Numero de Telefono</label>
                                <input type="tel" class="form-control" placeholder="Phone Number" id="phone" required data-validation-required-message="Please enter your phone number.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Mensage</label>
                                <textarea rows="5" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br>
                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" class="btn btn-success btn-lg">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    
    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll visible-xs visible-sm">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

    <!-- Portfolio Modals -->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container col-lg-offset-2">
                           <h2 class="" name="nombre_Logro" >HOLA MUNDO </h2>
                           <h3 class="" name="descripcion_Logro" ><?php
                     echo $decripcion_Logro;  ?> </h3>
                        <h3 class="" name="recompensa_Logro">Tu recompensa es :<?php echo $recompensa_Logro; ?> 
                        </h3>
                        <div><img class="img-responsive" src="data:image/jpg;base64,<?php echo base64_encode($imagen_Logro);?>" width="300px">
                          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                          </div>
                          
                            <ul class="list-inline item-details">
                            </ul>
             </div>
                    </div>
            
        </div>

          <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container col-lg-offset-2">
                           <h2 class="" name="nombre_Logro" >HOLA MUNDO 2</h2>
                           <h3 class="" name="descripcion_Logro" ><?php
                     echo $decripcion_Logro;  ?> </h3>
                        <h3 class="" name="recompensa_Logro">Tu recompensa es :<?php echo $recompensa_Logro; ?> 
                        </h3>
                        <div><img class="img-responsive" src="data:image/jpg;base64,<?php echo base64_encode($imagen_Logro);?>" width="300px">
                          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                          </div>
                          
                            <ul class="list-inline item-details">
                            </ul>
             </div>
                    </div>
            
        </div>

          <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container col-lg-offset-2">
                           <h2 class="" name="nombre_Logro" ><?php
                     echo $nombre_Logro;  ?> </h2>
                           <h3 class="" name="descripcion_Logro" ><?php
                     echo $decripcion_Logro;  ?> </h3>
                        <h3 class="" name="recompensa_Logro">Tu recompensa es :<?php echo $recompensa_Logro; ?> 
                        </h3>
                        <div><img class="img-responsive" src="data:image/jpg;base64,<?php echo base64_encode($imagen_Logro);?>" width="300px">
                          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                          </div>
                          
                            <ul class="list-inline item-details">
                            </ul>
             </div>
                    </div>
            
        </div>
    </div>
    
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/freelancer.js"></script>

</body>

</html>
