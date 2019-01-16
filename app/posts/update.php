<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

// In this file we delete posts in the database.


if (isset($_POST['changeDescription'], $_POST['postId']))
{
  $descriptionUpdate = trim(filter_var($_POST['changeDescription'], FILTER_SANITIZE_STRING));

  $postId = trim(filter_var($_POST['postId']));

  $updateStatement = $pdo->prepare('UPDATE posts SET description = :description WHERE id = :id');
  if (!$updateStatement)
        {
            die(var_dump($pdo->errorInfo()));
        }

  $updateStatement->bindParam(':description', $newDescription, PDO::PARAM_STR);
  $updateStatement->bindParam(':id', $postId, PDO::PARAM_INT);
  $updateStatement->execute();

  redirect('/../../index.php');
}
