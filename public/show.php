<?php
    require_once '../connec.php';
    $pdo = new \PDO(DSN, USER, PASSWORD);
    $id = $_GET['id'];
    $query = "SELECT * FROM story WHERE id=:id";
    $statement = $pdo->prepare($query);
    $statement->bindValue('id', $id);
    $statement->execute();

    $story = $statement->fetch();
?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détail</title>
</head>
<body>
    <h1><?= htmlentities($story['title']) ?></h1>
    <p><?= htmlentities($story['content']) ?></p>
    <div>par <?= htmlentities($story['author']) ?></div>


    <a href="edit.php?id=<?= $story['id'] ?>">Editer</a>

    <form method="POST" action="delete.php?id=<?= $story['id'] ?>">
        <button>Supprimer</button>
    </form>


    <a href="index.php">Retour</a>
</body>
</html>