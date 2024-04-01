<?php
// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexão com o banco de dados (substitua essas informações pelas suas)
    $servername = "localhost";
    $username = "root"; // Nome de usuário do MySQL
    $password = ""; // Senha do MySQL
    $database = "persona3"; // Nome do banco de dados

    // Cria a conexão
    $conn = new mysqli($servername, $username, $password, $database);

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Erro na conexão: " . $conn->connect_error);
    }

    // Obtém os dados do formulário e faz a sanitização
    $nome = mysqli_real_escape_string($conn, $_POST["nome"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $senha = mysqli_real_escape_string($conn, $_POST["senha"]);
    $idade = mysqli_real_escape_string($conn, $_POST["idade"]);

    // Verifica se já existe um usuário com o mesmo nome de usuário ou e-mail
    $sql_verifica = "SELECT * FROM usuarios WHERE nome = '$nome' OR email = '$email'";
    $result_verifica = $conn->query($sql_verifica);
    if ($result_verifica->num_rows > 0) {
        echo "<div style='color: red;'>Nome de usuário ou e-mail já em uso.</div><br>";
        echo "<br><a href='../html/cadastro.php'><button style='background-color: #0044cc; color: #fff; padding: 10px 20px; border: none; border-radius: 5px;'>Voltar</button></a>";
    } else {
        // Hash da senha
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

        // Prepara a instrução SQL de inserção
        $sql = "INSERT INTO usuarios (nome, email, senha, idade)
                VALUES ('$nome', '$email', '$senha_hash', '$idade')";

        // Executa a inserção
        if ($conn->query($sql) === TRUE) {
            echo "<div style='color: green;'>Cadastro realizado com sucesso!</div><br></br>";
            echo "<a href='../html/login.php'><button style='background-color: #0044cc; color: #fff; padding: 10px 20px; border: none; border-radius: 5px;'>Voltar</button></a>";
        } else {
            echo "Erro ao cadastrar: " . $conn->error;
        }
    }

    // Fecha a conexão
    $conn->close();
}


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cadastro de Usuário</title>
<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #121212;
    color: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    text-align: center;
}

.container > div {
    margin-bottom: 10px;
}

.container > div:last-child {
    margin-bottom: 0;
}
</style>
</head>
<body>

<div class="container">
    <?php
    // Exibe a mensagem de cadastro realizado com sucesso ou usuário/email já cadastrado
    ?>
</div>

</body>
</html>