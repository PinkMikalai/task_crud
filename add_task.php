<?php
require_once 'config/database.php';
$pdo = dbAgenda();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';
    $status = $_POST['status'] ?? 'à faire';
    $priority = $_POST['priority'] ?? 'moyenne';
    $due_date = $_POST['due_date'] ?? null;

    $stmt = $pdo->prepare("INSERT INTO tasks (title, description, status, priority, due_date) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$title, $description, $status, $priority, $due_date]);

    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une tache</title>
    <link rel="stylesheet" href="assets/style/style.css">
</head>
<body>
    

<form method="POST">
    <label>Titre : <input type="text" name="title" required></label><br>
    <label>Description : <textarea name="description"></textarea></label><br>
    <label>Status :
        <select name="status">
            <option value="à faire">À faire</option>
            <option value="en cours">En cours</option>
            <option value="terminée">Terminée</option>
        </select>
    </label><br>
    <label>Priorité :
        <select name="priority">
            <option value="basse">Basse</option>
            <option value="moyenne" selected>Moyenne</option>
            <option value="haute">Haute</option>
        </select>
    </label><br>
    <label>Date limite : <input type="date" name="due_date"></label><br>
    <button type="submit">Ajouter</button>
</form>

</body>
</html>