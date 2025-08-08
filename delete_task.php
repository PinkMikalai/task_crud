<?php
require_once 'config/database.php';
$pdo = dbAgenda();

if (isset($_POST['id'])) {
    $id = (int) $_POST['id'];
    $stmt = $pdo->prepare("DELETE FROM tasks WHERE id = ?");
    $stmt->execute([$id]);
}

header("Location: index.php");
exit;
