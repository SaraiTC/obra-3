<?php

$conexion;
$servidor = 'localhost';
$bd = 'obra';
$user = 'root';
$pass = '123';

try{
    $conexion = new PDO('mysql:host='.$servidor.';dbname='.$bd, $user, $pass);
} catch (PDOException $e){
    echo "Erro de conexión";
    exit;
}
return $conexion;
?>
