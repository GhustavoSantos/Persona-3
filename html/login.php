<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Persona 3 - Cadastro</title>
<link rel="stylesheet" href="../css/styles.css">
<link rel="stylesheet" href="../css/loginstyle.css">

</head>
<body>
<header>
    <h1>Persona 3</h1>
</header>

<main>
    <section id="cadastro">
        <h2>Cadastro</h2>
        <form action="quiz.html" method="post">
            <label for="username">Usuário:</label>
            <input type="text" id="username" name="username" required>
            <br>
            <label for="password">Senha:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <center>
            <button type="submit" href="quiz.html">Criar Conta</button>
        </center>
        </form>
        <p>Não tem uma conta? <a href="../html/cadastro.php">Faça uma aqui</a>.</p>
    </section>
</main>

<footer>
    <p>&copy; 2024 Persona 3. Gustavo Silva.</p>
</footer>
</body>
</html>
