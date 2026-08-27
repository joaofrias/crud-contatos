<?php
require 'config.php';

// Busca todos os contatos
$stmt = $pdo->query("SELECT * FROM contatos ORDER BY nome");
$contatos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>CRUD - Contatos</title>
    <style>
        body { font-family: Arial; margin: 40px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background: #f2f2f2; }
        a { text-decoration: none; color: #007bff; }
        .btn { padding: 5px 10px; border-radius: 4px; }
        .btn-add { background: #28a745; color: white; padding: 10px; display: inline-block; }
    </style>
</head>
<body>
    <h1>Lista de Contatos</h1>
    <h2>Teste no github</h2>
    <a class="btn-add" href="criar.php">+ Adicionar Contato</a>
    <br><br>

    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($contatos as $contato): ?>
        <tr>
            <td><?= $contato['id'] ?></td>
            <td><?= htmlspecialchars($contato['nome']) ?></td>
            <td><?= htmlspecialchars($contato['email']) ?></td>
            <td><?= htmlspecialchars($contato['telefone']) ?></td>
            <td>
                <a class="btn" href="editar.php?id=<?= $contato['id'] ?>">Editar</a>
                <a class="btn" href="excluir.php?id=<?= $contato['id'] ?>" onclick="return confirm('Excluir este contato?')">Excluir</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
