

<?php
// Importa a conexão com o banco.
require __DIR__ . '/conexao.php';

// livros cadastrados.
$sql = "SELECT * FROM Livros";

// Executa a consulta.
$consulta = $pdo->query($sql);

// arrays associativos.
$livros = $consulta->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Biblioteca</title>
</head>
<body>

    <h1>Gerenciamento de Livros</h1>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Gênero</th>
            <th>Ano</th>
            <th>Quantidade</th>
        </tr>

        <?php foreach ($livros as $livro): ?>
        <tr>
            <td><?= htmlspecialchars($livro['id']) ?></td>
            <td><?= htmlspecialchars($livro['titulo']) ?></td>
            <td><?= htmlspecialchars($livro['autor']) ?></td>
            <td><?= htmlspecialchars($livro['genero']) ?></td>
            <td><?= htmlspecialchars($livro['ano_publicacao']) ?></td>
            <td><?= htmlspecialchars($livro['quantidade']) ?></td>
        </tr>
        <?php endforeach; ?>

    </table>

</body>
</html>
