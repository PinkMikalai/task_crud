<?php
require_once 'config/database.php';

$pdo = dbAgenda();

// Récupérer toutes les tâches
$taches = $pdo->query("SELECT * FROM tasks ORDER BY due_date ASC");
$tasks = $taches->fetchAll();
?>


<!-- ici ma page principale -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Crud By Mikalai</title>
    <link rel="stylesheet" href="assets/style/style.css">
</head>

<body>
    <?= include "assets/includes/header.html"; ?>
    <main>
        <section>
            <div>
                <h2>Liste des tâches</h2>
                <a href="add_task.php">Ajouter une tâche</a>
            </div>
            <div>
                <!-- on separe notre tableau et puis on affiche les informations en boucle-->
                <?php foreach ($tasks as $task): ?>
                    <div class="boxTask">
                        <h3><?= htmlspecialchars($task['title']) ?></h3>
                        <article>
                            <p><?= htmlspecialchars($task['description']) ?></p>
                            <span>Status : <?= htmlspecialchars($task['status']) ?></span> |
                            <span>Priorité : <?= htmlspecialchars($task['priority']) ?></span> |
                            <span>À rendre pour : <?= htmlspecialchars($task['due_date']) ?></span>
                        </article>
                        <form action="delete_task.php" method="POST">
                            <input type="hidden" name="id" value="<?= $task['id'] ?>">
                            <button type="submit">Supprimer</button>
                        </form>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </main>
    <?= include "assets/includes/footer.html"; ?>
</body>
</html>