<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

// In this file we delete new posts in the database.

// Delete post

if (isset($_POST['postId'])) {
    $postId = trim(filter_var($_POST['postId']));
    $deleteStatement = $pdo->prepare('DELETE FROM posts WHERE id = :id');

    if (!$deleteStatement) {
        die(var_dump($pdo->errorInfo()));
    }

    $deleteStatement->bindParam(':id', $postId, PDO::PARAM_INT);
    $deleteStatement->execute();

    redirect('/../../index.php');
}
