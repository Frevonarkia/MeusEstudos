<?php
require __DIR__ . '/conexao.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

//Verificação de ID
if (!$id || $id < 1) {
    die('Livro inválido');
}

$sql = "SELECT * FROM Livros WHERE id = ?";
$consulta = $pdo->prepare($sql);
$consulta->execute([$id]);

//Recupera dados do livro
$livro = $consulta->fetch(PDO::FETCH_ASSOC);

//verifica se o livro existe
if (!$livro) {
    die('Livro não encontrado');
}
   //verifica se o usuario confirmou a exclusão do livro
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  //comando para apagar/excluir
    $sql = "DELETE FROM Livros WHERE id = ?";
    $comando = $pdo->prepare($sql);

   //executa o comando de exclusão
    $comando->execute([$id]);

  //volta para pagina principal
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilo.css">
    <title>Excluir Livro</title>
</head>
<body>

    <h1>Excluir Livro</h1>

    <p>
        Tem certeza de que deseja excluir o livro
        <strong>
            <?= htmlspecialchars($livro['titulo'], ENT_QUOTES, 'UTF-8') ?>
        </strong>?
    </p>

    <form method="POST">
        <button type="submit">Sim, excluir livro</button>
    </form>

    <p>
        <a href="index.php">Cancelar e voltar</a>
    </p>

</body>
</html>