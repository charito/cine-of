<?php
session_start();

// echo $tmp."+";
// die();
if (isset($_SESSION['solicitante'])) {
  
      require_once("funciones.php");?>
      <?php 
        require_once("header-principal.php");?>
      <?php
      $xc=conectar();   
       $sql="SELECT nombre_Categoria FROM categoria";              
       $resultado=mysqli_query($xc,$sql)
       or die ("Error al consultar los datos");
      
       desconectar($xc)
     
       ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Seleccione categorias favoritas
      </h1>
      <ol class="breadcrumb">
         
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
         <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">

              <div class="box-body">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Número de FUT</label>
                    <div class="input-group col-sm-9">
                      <input type="text" class="form-control">
                      <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Tipo de Trámite</label>
                    <div class="input-group col-sm-9">
                      <input type="text" class="form-control">
                      <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    </div>
                  </div>                  
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">DNI</label>
                    <div class="input-group col-sm-9">
                      <input type="text" class="form-control">
                      <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    </div>
                  </div> 
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Estado</label>
                    <div class="input-group col-sm-9">
                      <input type="text" class="form-control">
                      <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    </div>
                  </div>                  
                </div>
              </div>

          </div>
         </div>
      </div>

  <section class="content">
     
     


      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                
                <tr>
                  <th>Nro de FUT</th>
                  <th>Tipo de Trámite</th>
              
                  
                  <th>Asunto</th>
                  <th>Estado</th>
                  <th>Fecha Registro</th>
                  <th>Acciones</th>
                  
                </tr>

           <?php
             while ($extraido = mysqli_fetch_array($resultado)) {

             echo "<tr> <td>";
               echo $extraido['nro_documento'];
             echo "</td>";
             echo "<td>";
               echo $extraido['desc_tipodoc'];
               echo '</td>';
             
              echo '<td>';
                echo $extraido['sumilla_documento'];
             echo '</td>';
              echo '<td>';
                echo $extraido['estado_documento'];
             echo '</td>';
              echo '<td>';
                echo $extraido['fecha_creacion_documento'];
             echo '</td>';
             echo"<td>";
        echo "<a href='ApTramite.php?id=$extraido[id_documento]&ids=$extraido[id_solicitante]&idt=$extraido[id_tipodoc]'>Veer</a>\n ";
      echo"</td>";
             echo '</tr>';

                       
             }         
              
            ?>

                
              </table>
            </div>
         
          
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
  
      <!-- /.row -->
    </section>
  
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php require_once("footer.php");?>

<?php
}
else
{
  header("Location: index.php");
}
?>
