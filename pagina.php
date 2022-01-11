<?php
$envio = array();
foreach($_POST as $key => $value) {
    $envio[$key] = $value;
}
// $envio = array('name_user' => $name_user,'experience'=>$experience.'last_name_user'=> );
//datos a enviar
$data = $envio;
//url contra la que atacamos
$ch = curl_init("https://academia.nodo.com.ec/empleo");
//a true, obtendremos una respuesta de la url, en otro caso, 
//true si es correcto, false si no lo es
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//establecemos el verbo http que queremos utilizar para la petición
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
//enviamos el array data
curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));
//obtenemos la respuesta
$response = curl_exec($ch);
// Se cierra el recurso CURL y se liberan los recursos del sistema
curl_close($ch);
if(!$response || !$response.successful ) {
    header('HTTP/1.1 500 Internal Server Booboo');
    header('Content-Type: application/json; charset=UTF-8');
    echo($response);
}else{
    echo($response);
}
?> 