<?php
    require_once '../connec.php';
    
    $pdo = new \PDO(DSN, USER, PASSWORD);

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $query = "DELETE FROM story WHERE id=:id";
        $statement = $pdo->prepare($query);
        $statement->bindValue('id', $_GET['id']);
        $statement->execute();

        header('Location: index.php?message=La story a bien été supprimée');
    }

?>