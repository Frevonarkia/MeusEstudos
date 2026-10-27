<?php
require __DIR__ . '/conexao.php';

//recebe o id do livro enviado

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

//pede edição sem ser valido/verifica
if (!$id || $id < 1) {
    die(' Livro Invalido');
}
// Procura o livro pela ID
$sql = "SELECT * FROM Livros WHERE id = ?";
$consulta = $pdo->prepare($sql);
$consulta->execute([$id]);

// Busca os dados do livro no resultado da consulta.
$livro = $consulta->fetch(PDO::FETCH_ASSOC);

// Verifica se o livro realmente foi encontrado.
if (!$livro) {
    die('Livro não encontrado');
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

$titulo = trim($_POST['titulo'] ?? '');
$autor = trim($_POST['autor'] ?? '');
$genero = trim($_POST['genero'] ?? '');
$ano = $_POST['ano_publicacao'] ?? '';
$quantidade = $_POST['quantidade'] ?? '';

//Verifica os campos obrigatorios
if (
    $titulo === ''||
    $autor === ''||
    $genero === ''||
    $ano === ''||
    $quantidade === ''
){
    die('Preencha todos os campos.');
}

$sql = "UPDATE Livros SET titulo =?, autor = ?, genero = ?, ano_publicacao = ?, quantidade = ? WHERE id = ?";

$comando = $pdo->prepare($sql);

$comando->execute([
    $titulo, 
    $autor, 
    $genero, 
    $ano, 
    $quantidade, 
    $id
]);

header('Location: index.php');
exit;
// essa merda aqui fecha o if que verifica o formulario referente ao REQUEST-METHOD (POST)
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilo.css">
    <title>Editar Livro</title>
</head>
<body>
    <h1>Editar Livro</h1>
    <form method="POST">
        <label>Título:</label>
        <input type="text" name="titulo"
        maxlength="150"
        value="<?= htmlspecialchars($livro['titulo'], ENT_QUOTES, 'UTF-8') ?>"
        required>

        <label>Autor:</label>
        <input type="text" name="autor"
        maxlength="100"
        value="<?= htmlspecialchars($livro['autor'], ENT_QUOTES, 'UTF-8') ?>"
        required>

        <label>Gênero:</label>
        <input type="text" name="genero"
        maxlength="50"
        value="<?= htmlspecialchars($livro['genero'], ENT_QUOTES, 'UTF-8') ?>"
        required>

        <label>Ano de publicação:</label>
        <input type="number" name="ano_publicacao"
        min="1"
        value="<?= htmlspecialchars($livro['ano_publicacao'])?>"
        required>

        <label>Quantidade:</label>
        <input type="number" name="quantidade"
        min="0"
        value="<?= htmlspecialchars($livro['quantidade'])?>"
        required>

        <button type="submit">Salvar alterações</button>
    </form> 

    <p><a href="index.php">Cancelar e voltar</a></p>

</body>

</html> 