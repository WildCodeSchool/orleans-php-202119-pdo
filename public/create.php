<?php
    require_once '../connec.php';
    $pdo = new \PDO(DSN, USER, PASSWORD);

    $errors = [];

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $story = array_map('trim', $_POST);

        if(empty($story['title'])) {
            $errors[] = 'Le titre est obligatoire';
        }
        $maxTitleLength = 255;
        if(strlen($story['title']) > $maxTitleLength) {
            $errors[] = 'Le titre doit faire moins de ' . $maxTitleLength;
        }
        
        $maxAuthorLength = 100;
        if(strlen($story['author']) > $maxAuthorLength) {
            $errors[] = 'L\'auteur doit faire moins de ' . $maxAuthorLength;
        }

        if(empty($story['content'])) {
            $errors[] = 'Le contenu est obligatoire';
        }

        if(!empty($errors)) {
            var_dump($errors);
        } else {
            // insert en BDD
            $query = 'INSERT INTO story (title, author, content) VALUES(:title, :author, :content)';
            $statement = $pdo->prepare($query);
            $statement->bindValue('title', $story['title']);
            $statement->bindValue('author', $story['author']);
            $statement->bindValue('content', $story['content']);

            $statement->execute();

            header('Location: create.php?message=Histoire ajoutée');
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>
    <div>
        <?= $_GET['message'] ?? '' ?>
    </div>
    <main>
        <h1>Create story</h1>
        <form action="" method="POST" novalidate>
            <label for="title">Titre</label>
            <input required type="text" id="title" name="title" value="<?= $story['title'] ?? ''?>">

            <label for="author">Auteur</label>
            <input type="text" id="author" name="author" value="<?= $story['author'] ?? ''?>">

            <label for="content">Contenu</label>
            <textarea required id="content" name="content"><?= $story['content'] ?? ''?></textarea>

            <button>Valider</button>
        </form>
    </main>
</body>

</html>