
<?php
include("conexao.php");
echo "<link rel='stylesheet' href='estilo.css'>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe os dados do formulário
    $cliente = $_POST['cliente'];
    $veiculo = $_POST['veiculo'];
    $valor = $_POST['valor'];
    $periodo = $_POST['periodo'];

    // Insere os dados na tabela
    $sql = "INSERT INTO locacoes (cliente, veiculo, valor, periodo) VALUES ('$cliente', '$veiculo', '$valor', '$periodo')";

    if (mysqli_query($conexao, $sql)) {
        echo "<h2>Locação cadastrada com sucesso!</h2>";
        echo "<br>";
        echo "<a href='index.html' class='botao-link'>Voltar ao início</a>";
    } else {
        echo "<p>Erro: " . mysqli_error($conexao) . "</p>";
    }
}

echo "<br><br><br>";

// Exibe tabela com os dados
echo "<h2>Lista de Locações</h2>";
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

$total_locacoes = 0; // Variável para armazenar o total das locações

while ($registro = mysqli_fetch_array($resultado)) {
    $id = $registro['id'];
    $cliente = $registro['cliente'];
    $veiculo = $registro['veiculo'];
    $valor = $registro['valor'];
    $periodo = $registro['periodo'];

    // Soma o valor da locação ao total
    $total_locacoes += $valor;

    echo "<tr>";
    echo "<td>" . $id . "</td>";
    echo "<td>" . $cliente . "</td>";
    echo "<td>" . $veiculo . "</td>";
    echo "<td>R$ " . number_format($valor, 2, ',', '.') . "</td>"; // Formatação do valor em moeda
    echo "<td>" . $periodo . "</td>";
    echo "</tr>";
}
echo "</table>";

// Exibe o total das locações
echo "<h3>Total de Locações: R$ " . number_format($total_locacoes, 2, ',', '.') . "</h3>";

echo "<br><br><br>";

// Formulário de exclusão
echo "<form name='exclui' action='excluir.php' method='post'>";
echo "<p>Digite o nome que deseja excluir: ";
echo "<input type='text' name='cliente' />";
echo "</p>";
echo "<input type='submit' name='botao' value='Enviar' />";
echo "</form>";

mysqli_close($conexao);
?>
