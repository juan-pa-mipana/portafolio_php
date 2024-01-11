<?php include("cabecera.php"); ?>
<?php include("conexion.php"); ?>
<?php

if($_POST){
  
   $nombre=$_POST['nombre'];
   $descricion= $_POST['descricion'];

   $fecha= new DateTime();

   $imagen=$fecha->getTimesTamp()."_".$_FILES['archivo']['name'];

   $imagen_temporal=$_FILES['archivo']['tmp_name'];

   move_uploaded_file($imagen_temporal,"imagenes/".$imagen);

   $objConexion= new conexion();
   $sql="INSERT INTO `proyectos` (`id`, `nombre`, `imagen`, `descricion`) VALUES (NULL,'$nombre','$imagen', '$descricion');";
   $objConexion->ejecutar($sql);
   header("location:portafolio.php");
}
if($_GET){
    //DELETE FROM `proyectos` WHERE `proyectos`.`id` = 1"
    $id=$_GET['borrar'];
    $objConexion= new conexion();

    $imagen=$objConexion->consultar("SELECT imagen FROM `proyectos` WHERE id=".$id);

    unlink("imagenes/".$imagen[0]["imagen"]);

    $sql="DELETE FROM `proyectos` WHERE `proyectos`.`id` =". $id;
    $objConexion->ejecutar($sql);
    header("location:portafolio.php");
    
}

$objConexion= new conexion();
$resultado=$objConexion->consultar("SELECT * FROM `proyectos`");
//print_r($resultado);


?>

<br>
<div class="container">
    <div class="row">
        <div class="col-5">
            <div class="card">
                <div class="card-header">Datos del proyecto</div>
                <div class="card-body">

                    <form action="portafolio.php" method="post" enctype="multipart/form-data">
                        Nombre del proyecto: <input required class="form-control" type="text" name="nombre" id="">
                        <br>
                        Imagen del proyecto: <input required class="form-control" type="file" name="archivo" id="">
                        <br>
                        Descrición:
                            <textarea required class="form-control" name="descricion" ></textarea>
                        <br>
                        <input class="btn btn-success" type="submit" value="Enviar proyecto">
                    </form>

                </div>

            </div>

        </div>
        <div class="col-6">
        <div class="table-responsive">
    <table class="table table-primary">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">imagen</th>
                <th scope="col">Descrición</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($resultado as $proyecto) { ?>
            <tr class="">
                <td><?php echo $proyecto['id']; ?></td>
                <td><?php echo $proyecto['nombre']; ?></td>
                <td><?php echo $proyecto['imagen']; ?></td>
                <td><?php echo $proyecto['descricion']; ?></td>
                <td> <a class="btn btn-danger" href="?borrar=<?php echo $proyecto['id'];?>">Eliminar</a>
                </td>
            </tr>
            <?php } ?>

        </tbody>
    </table>
</div>

        </div>

    </div>
</div>


<?php include("pie.php"); ?>