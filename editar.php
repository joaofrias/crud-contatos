<?php
require 'config.php';

$id = $_GET['id'];

// Busca o contato atual
$stmt = $pdo->prepare("SELECT * FROM contatos WHERE id = ?");
$stmt->execute([$id]);
$contato = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $stmt = $pdo->prepare("UPDATE contatos SET nome = ?, email = ?, telefone = ? WHERE id = ?");
    $stmt->execute([$nome, $email, $telefone, $id]);

    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Contato</title>
    <style>
        body { font-family: Arial; margin: 40px; }
        input { display: block; margin-bottom: 10px; padding: 8px; width: 300px; }
        button { padding: 8px 20px; background: #007bff; color: white; border: none; }
    </style>
</head>
<body>
    <h1>Editar Contato</h1>
    <form method="POST">
        <label>Nome:</label>
        <input type="text" name="nome" value="<?= htmlspecialchars($contato['nome']) ?>" required>

        <label>Email:</label>
        <input type="email" name="email" value="<?= htmlspecialchars($contato['email']) ?>" required>

        <label>Telefone:</label>
        <input type="text" name="telefone" value="<?= htmlspecialchars($contato['telefone']) ?>">

        <button type="submit">Atualizar</button>
        <a href="index.php">Cancelar</a>
    </form>
</body>
</html>