<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

//UPDATE EMAIL AND NAME

if (isset($_POST['name'],$_POST['email'])) {

     $name = trim(filter_var($_POST['name'], FILTER_SANITIZE_STRING));
     $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));

     $id = $_SESSION['user']['id'];

    $query = 'UPDATE users
    SET name = :name, email = :email
    WHERE id = :id';

    $updateStatement = $pdo->prepare($query);

    if (!$updateStatement) {
        die(var_dump($pdo->errorInfo()));
    }

    $updateStatement->bindParam(':id', $id, PDO::PARAM_INT);
    $updateStatement->bindParam(':name', $name, PDO::PARAM_STR);
    $updateStatement->bindParam(':email', $email, PDO::PARAM_STR);
    $updateStatement->execute();

    $_SESSION['user']['name'] = $name;
    $_SESSION['user']['email'] = $email;

}

//UPDATE PASSWORD

if (isset($_POST['new-password'], $_POST['password-confirm'])) {

  if ($_POST['new-password'] === $_POST['password-confirm']) {

    $password = password_hash($_POST['new-password'], PASSWORD_DEFAULT);
    $id = $_SESSION['user']['id'];

    $query = 'UPDATE users
    SET password = :password
    WHERE id = :id';

    $updatePasswordStatement = $pdo->prepare($query);

    $updatePasswordStatement->bindParam(':id', $id, PDO::PARAM_INT);
    $updatePasswordStatement->bindParam(':password', $password, PDO::PARAM_STR);
    $updatePasswordStatement->execute();

    if (!$updatePasswordStatement) {
        die(var_dump($pdo->errorInfo()));
    };
  }else {
    echo 'password don\'t match';
  }
}

redirect('/views/profile.php');
