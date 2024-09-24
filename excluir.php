
<?php
include("conexao.php");
echo "<link rel='stylesheet' href='estilo.css'>";


$pesquisa = $_POST['cliente'];

$sql = "DELETE FROM locacoes WHERE cliente = '$pesquisa'";

$resultado = mysqli_query($conexao, $sql);
echo "<br>";
echo "Exclusão realizada com sucesso!";
echo "<br>";
echo "<br>";
echo "<br>";

// Exibe tabela com os dados
echo "<table border='1' style='width: 50%'>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>Cliente</th>";
echo "<th>Veículo</th>";
echo "<th>Valor</th>";
echo "<th>Período</th>";
echo "</tr>";

$sql = "SELECT * FROM locacoes";
$resultado = mysqli_query($conexao, $sql);

while($registro = mysqli_fetch_array($resultado)){
    $id = $registro['id'];
    $cliente = $registro['cliente'];
    $veiculo = $registro['veiculo'];
    $valor = $registro['valor'];
    $periodo = $registro['periodo'];

    echo "<tr>";
    echo "<td>" . $id . "</td>";
    echo "<td>" . $cliente . "</td>";
    echo "<td>" . $veiculo . "</td>";
    echo "<td>" . $valor . "</td>";
    echo "<td>" . $periodo . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($conexao);

echo "<br>";
echo "<br>";
echo "<br>";

echo "<h1><a href='index.html' class='botao-link'>Voltar ao inicio</a></h1>";

?>