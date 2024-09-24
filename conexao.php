<?php
$servername = "localhost";
$username = "root";
$password = "";
$database="locação_veiculos";

$conexao = mysqli_connect($servername, $username, $password, $database);

if(!$conexao){
    die("Falha na Conexão: " . mysqli_connect_error());

}
echo "<br>";
echo "<br>";
echo "<br>";

