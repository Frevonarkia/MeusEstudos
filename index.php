

<?php
// Importa a conexão com o banco.
require __DIR__ . '/conexao.php';
// Recebe a busca, algo assim kk
$busca = trim($_GET['busca'] ?? '');

// livros cadastrados.
$sql = "SELECT * FROM Livros WHERE titulo LIKE :busca ORDER BY titulo ASC";

// Executa a consulta.
$consulta = $pdo->prepare($sql);
$consulta->execute([
    'busca' => '%' . $busca . '%'
]);

// arrays associativos.
$livros = $consulta->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilo.css">
    <title>Biblioteca</title>
</head>
<body>

    <h1>Gerenciamento de Livros</h1>

    <p><a href="cadastrar.php">+ Cadastrar um novo livro</a></p>
    <form method="GET" action="index.php">
        <input type="text"
               name="busca"
               placeholder="pesquisar pelo titulo"
               value="<?= htmlspecialchars($busca, ENT_QUOTES, 'UTF-8') ?>"
        >
        <button type="submit">Pesquisar</button>
        <a href="index.php">Limpar</a>
    </form>

<!-- Table Row (linha da tabela)    
 td table: Table (tabela)    
 th Table Header (cabeçalho da tabela)
-->

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Gênero</th>
            <th>Ano</th>
            <th>Quantidade</th>
            <th>Ações</th>
        </tr>
<!-- foreach significa percorrer cada elemento de uma coleção. -->
        <?php foreach ($livros as $livro): ?>
        <tr>
            <td><?= htmlspecialchars($livro['id']) ?></td>
            <td><?= htmlspecialchars($livro['titulo']) ?></td>
            <td><?= htmlspecialchars($livro['autor']) ?></td>
            <td><?= htmlspecialchars($livro['genero']) ?></td>
            <td><?= htmlspecialchars($livro['ano_publicacao']) ?></td>
            <td><?= htmlspecialchars($livro['quantidade']) ?></td>
            <td>
                <a href="editar.php?id=<?= urlencode($livro['id']) ?>">Editar
                </a>
                <a href="excluir.php?id=<?= urlencode($livro['id']) ?>">Excluir
                </a>
            </td>
        </tr>
        <?php endforeach; ?>

    </table>

</body>
</html>
