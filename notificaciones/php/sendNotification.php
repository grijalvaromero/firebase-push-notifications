<?php 
include "conexion.php";

$severKey="SERVER_KEY";
$url="https://fcm.googleapis.com/fcm/send";

$mensaje = $_POST['mensaje'];
$tokenId=$_POST['token'];
$prioridad=$_POST['prioridad'];
$icono="http://localhost/notificaciones/img/icon.png";
if($prioridad == 'alta'){
    $icono="http://localhost/notificaciones/img/icon.png";
}
$field=array(
    'data'=>array(
        'notification'=>array(
            'title'=>'No has pagado',
            'body'=>$mensaje,
            'icon'=>$icono
        )
        ),
    'to'=>$tokenId    
);
$fields=json_encode($field);

$header=array(
    'Authorization: key='.$severKey,
    'Content-Type: application/json'
);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);

$result=curl_exec($ch);
echo $result;
curl_close($ch);