<?php

include("con_db.php");

try{
    //Importar una conexion
    //codigo SQL
    $sql1 = "SELECT * FROM asistentes WHERE estado = 'Pendiente'";
    $consultaExpositores = mysqli_query($conex, $sql1);

    //Obtener resultados
    $expositores = mysqli_fetch_all($consultaExpositores);
    

} catch(\Throwable $th){
    //code
    var_dump($th);
}

try{
  //Importar una conexion
  //codigo SQL
  $sql2 = "SELECT * FROM asistentes WHERE estado = 'Aprobado'";
  
  $consultaAsistentes = mysqli_query($conex, $sql2);

  //Obtener resultados
  $asistentes = mysqli_fetch_all($consultaAsistentes);
  

} catch(\Throwable $th){
  //code
  var_dump($th);
}

// foreach($cliente as $key => $valor){
//     echo $key . "-" . $valor. '<br>';
// }

function aprobar(){
  // include("con_db.php");


  // $consulta = "INSERT INTO asistentes(nombre, clave_tel_pais, telefono, email, empresa, puesto, tipo_empresa, observaciones,servicios,stands,tipo) VALUES ('$','$','$','$','$','$', '$', '$', '$', '$', 'expositor')";


  // $resultado = mysqli_query($conex,$consulta);
  // if ($resultado) {
  //   header("Location: http://localhost/regMaq/registrado.html");
  //   //<h3 class="ok">¡Te has inscripto correctamente!</h3>
             
  //    } else {
  //     header("Location: https://www.google.com");
  //   // <h3 class="bad">¡Ups ha ocurrido un error!</h3>
             
  //    }
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Septimo Encuentro - Admin</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="styleRegistro.css">
      <link href="https://fonts.googleapis.com/css2?family=Khand&display=swap" rel="stylesheet">
  </head>
  <body>
  <div class="TODO">

    <nav style="position: fixed; display: flex; background-color: #004F9F; width: 100%; padding: 10px;  ">
      <div style="width: 500px; height: 75px; ">
          <img src="img/logoBN.png" alt="frame" style="width: 170px; height: 75px; margin-left: 40px;">
      </div>
      <a href="tel:+"></a>      
    </nav>

    <ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-top:100px;">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Solicitudes</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Registros</button>
        </li>
      </ul>

      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
            <div>
                <table class="table table-hover">
                    <thead>
                    <tr>
                      <th scope="row">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Codigo de Pais</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Email</th>
                        <th scope="col">Empresa</th>
                        <th scope="col">Puesto</th>
                        <th scope="col">Tipo de Empresa</th>
                        <th scope="col">Observaciones</th>
                        <th scope="col">Servicios</th>
                        <th scope="col">Stands</th>
                        <th scope="col" style="font-size: 10px;">Cant. de Personas</th>
                        <th scope="col">Status</th>
                        <th scope="col">Tipo</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($expositores as $expos){ ?>
                        <tr>
                            <td><?php echo $expos['0']; ?></td>
                            <td><?php echo $expos['1']; ?></td>
                            <td><?php echo $expos['2']; ?></td>
                            <td><?php echo $expos['3']; ?></td>
                            <td><?php echo $expos['4']; ?></td>
                            <td><?php echo $expos['5']; ?></td>
                            <td><?php echo $expos['6']; ?></td>
                            <td><?php echo $expos['7']; ?></td>
                            <td><?php echo $expos['8']; ?></td>
                            <td><?php echo $expos['9']; ?></td>
                            <td><?php echo $expos['10']; ?></td>
                            <td><?php echo $expos['11']; ?></td>
                            <td><?php echo $expos['12']; ?></td>
                            <td><?php echo $expos['13']; ?></td>
                            <td><button type="button" class="btn btn-light"><i class="fa-solid fa-pen-to-square"></i></button></td>
                            <td><button onclick="<?php aprobar() ?>" type="button" class="boton_aprobar">APROBAR</button></td>
                        </tr>
                    <?php
                    }
                    ?>
                    </tbody>
              </table>
            </div>
        </div>
        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="1">
            <div>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="row">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Codigo de Pais</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Email</th>
                        <th scope="col">Empresa</th>
                        <th scope="col">Puesto</th>
                        <th scope="col">Tipo de Empresa</th>
                        <th scope="col">Observaciones</th>
                        <th scope="col">Servicios</th>
                        <th scope="col">Stands</th>
                        <th scope="col" style="font-size: 10px;">Cant. de Personas</th>
                        <th scope="col">Status</th>
                        <th scope="col">Tipo</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($asistentes as $asis){ ?>
                        <tr>
                            <td><?php echo $asis['0']; ?></td>
                            <td><?php echo $asis['1']; ?></td>
                            <td><?php echo $asis['2']; ?></td>
                            <td><?php echo $asis['3']; ?></td>
                            <td><?php echo $asis['4']; ?></td>
                            <td><?php echo $asis['5']; ?></td>
                            <td><?php echo $asis['6']; ?></td>
                            <td><?php echo $asis['7']; ?></td>
                            <td><?php echo $asis['8']; ?></td>
                            <td><?php echo $asis['9']; ?></td>
                            <td><?php echo $asis['10']; ?></td>
                            <td><?php echo $asis['11']; ?></td>
                            <td><?php echo $asis['12']; ?></td>
                            <td><?php echo $asis['13']; ?></td>
                            <td> <button type="button" class="btn btn-light"><i class="fa-solid fa-print"></i></button></td>
                            <td> <button type="button" class="btn btn-light"><i class="fa-solid fa-pen-to-square"></button></i></td>
                            <td> <button type="button" class="btn btn-light"><i class="fa-solid fa-trash"></i></button></td>
                        </tr>
                    <?php
                    }
                    ?>
                    
                    </tbody>
              </table>
            </div>
        </div>
      </div>
    
    <script src="https://kit.fontawesome.com/4df35409e9.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    </div>
  </body>
</html>