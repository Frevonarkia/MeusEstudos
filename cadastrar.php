
<?php
require __DIR__ . '/conexao.php';

// Verifica se o formulário foi enviado.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Recebe os dados digitados no formulário.
    $titulo = trim($_POST['titulo'] ?? '');
    $autor = trim($_POST['autor'] ?? '');
    $genero = trim($_POST['genero'] ?? '');
    $ano = $_POST['ano_publicacao'] ?? '';
    $quantidade = $_POST['quantidade'] ?? '';

    // Confere se os campos foram preenchidos.
    if ($titulo === '' || $autor === '' || $genero === ''
        || $ano === '' || $quantidade === '') {
        die('Preencha todos os campos.');
    }

    // Prepara a consulta SQL.
    $sql = "INSERT INTO Livros
            (titulo, autor, genero, ano_publicacao, quantidade)
            VALUES (?, ?, ?, ?, ?)";

    $comando = $pdo->prepare($sql);

    // Envia os valores para o MySQL.
    $comando->execute([
        $titulo, $autor, $genero, $ano, $quantidade
    ]);

    // Retorna à listagem.
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Livro</title>
</head>
<body>

    <h1>Cadastrar Livro</h1>

    <form method="POST">
        <label>Título:</label>
        <input type="text" name="titulo" required maxlength="150">

        <label>Autor:</label>
        <input type="text" name="autor" required maxlength="100">

        <label>Gênero:</label>
        <input type="text" name="genero" required maxlength="50">

        <label>Ano de publicação:</label>
        <input type="number" name="ano_publicacao" min="1" required>

        <label>Quantidade:</label>
        <input type="number" name="quantidade" min="0" required>

        <button type="submit">Cadastrar</button>
    </form>

    <p><a href="index.php">Voltar à listagem</a></p>

</body>
</html>

