<?php
// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexão com o banco de dados (substitua essas informações pelas suas)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "persona3";

    // Cria a conexão
    $conn = new mysqli($servername, $username, $password, $database);

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Erro na conexão: " . $conn->connect_error);
    }

    // Obtém os dados do formulário
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    // Prepara a instrução SQL para selecionar o usuário com base no nome de usuário e senha
    $sql = "SELECT * FROM usuarios WHERE nome = '$usuario' AND senha = '$senha'";

    // Executa a consulta
    $result = $conn->query($sql);

    // Verifica se o usuário foi encontrado
    if ($result->num_rows > 0) {
        // Obtém os dados do usuário
        $row = $result->fetch_assoc();
        $genero = $row["genero"];
        
        // Redireciona o usuário para outra página com base no gênero
        if ($genero == "masculino") {
            header("Location: ../html/quiz_azul.html");
        } elseif ($genero == "feminino") {
            header("Location: ../html/quiz_rosa.html");
        } else {
            // Se o gênero não for definido ou for outro valor, redirecione para uma página padrão
            header("Location: ../html/quiz_padrao.php");
        }
    } else {
        // Se o usuário não for encontrado, redireciona de volta para a página de login com uma mensagem de erro
        echo "ERROR";
    }

    // Fecha a conexão
    $conn->close();
}
?>
