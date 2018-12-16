<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

if (isset($_POST['user-name'], $_POST['email-r'], $_POST['password-r'])) {

    $emailReg = filter_var($_POST['email-r'], FILTER_SANITIZE_EMAIL);
    $userName = filter_var($_POST['user-name'], FILTER_SANITIZE_STRING);
    $password = password_hash($_POST['password-r'], PASSWORD_DEFAULT);

    $query = "INSERT INTO users (username, email, password) VALUES (:userName, :emailReg, :password)";
    $statement = $pdo->prepare($query);

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    // Bind parameters to statement variables
    $statement->bindParam(':userName', $userName, PDO::PARAM_STR);
    $statement->bindParam(':emailReg', $emailReg, PDO::PARAM_STR);
    $statement->bindParam(':password', $password, PDO::PARAM_STR);
    $statement->execute();

}
//
// redirect('/');
