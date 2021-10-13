<?php
require_once '../connec.php';
$pdo = new \PDO(DSN, USER, PASSWORD);

$statement = $pdo->query("SELECT * FROM story");

$stories = $statement->fetchAll(PDO::FETCH_ASSOC);

// $stories = [
//     ['title' => 'quete du graal', 'author' => 'Arthur', 'content' => 'lorem ipsum'],
//     ['title' => 'quete du dragon bleu', 'author' => 'Bohort', 'content' => 'blabla'],
//     ['title' => 'quete du serpent géant', 'author' => 'Perceval', 'content' => 'une anguille'],
// ]
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Story</title>
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>
    <h1>Les histoires de père Blaise</h1>
    <?= $_GET['message'] ?? '' ?>

    <div class="stories">
        <?php foreach ($stories as $story) : ?>
            <a href="show.php?id=<?= $story['id'] ?>">
                
                <div class="story">
                    <h2><?= htmlentities($story['title']) ?></h2>
                    <div>par <?= htmlentities($story['author']) ?></div>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</body>

</html>