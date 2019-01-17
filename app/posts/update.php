<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

// In this file we delete posts in the database.


if (isset($_POST['description-update'], $_POST['post-id']))
{
  $descriptionUpdate = trim(filter_var($_POST['description-update'], FILTER_SANITIZE_STRING));

  $postId = trim(filter_var($_POST['post-id']));

  $updateStatement = $pdo->prepare('UPDATE posts SET description = :description WHERE id = :id');

  if (!$updateStatement)
        {
            die(var_dump($pdo->errorInfo()));
        }

  $updateStatement->bindParam(':description', $descriptionUpdate, PDO::PARAM_STR);
  $updateStatement->bindParam(':id', $postId, PDO::PARAM_INT);
  $updateStatement->execute();

  redirect('/../../index.php');
}
