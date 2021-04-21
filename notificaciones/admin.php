<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notificaciones Push</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col col-lg-8">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                    
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        include "./php/conexion.php";
                        $res=$conexion->query("select * from suscripciones");
                        while($fila= mysqli_fetch_array($res)){
                    ?>
                    <tr>
                        <th scope="row">1</th>
                        <td>Usuario <?php echo $fila['id_user']; ?></td>
                        <td>
                            <button class="btn btn-outline-primary sendNoti" data-bs-toggle="modal" 
                                data-bs-target="#exampleModal"  data-token="<?php echo $fila['token']; ?>">Enviar </button>
                        </td>
                    </tr>
                    <?php  } ?>
                </tbody>
                </table>
            </div>
            
        </div>
       
    </div>
   


    <div class="position-fixed top-0 end-0" style="z-index: 5">
        <div id="liveToast" class="toast hide text-white bg-primary border-0" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header">
           
            <strong class="me-auto">Tienda</strong>
            <small>Alerta</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
          <div class="toast-body">
           Mensaje Enviado
          </div>
        </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Enviar notificacion</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="./php/sendNotification.php">
        <div class="modal-body">
                <input type="hidden" id="token" name="token">
                <select name="prioridad" id="" class="form-control">
                    <option value="alta">Alta</option>
                    <option value="media">Media</option>
                </select>                
                <br>
                <input type="text" placeholder="mensaje" name="mensaje" class="form-control">                   
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
      </form>
      
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
 <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    window.onload=()=>{
        const botones= document.querySelectorAll('.sendNoti');
        botones.forEach( el=>el.addEventListener('click',evt=>{
            var token=evt.target.getAttribute('data-token');
            document.getElementById('token').value =token;
        }))
    };

</script>
</body>
</html>