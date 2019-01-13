<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';


if (isset($_POST['save'])) {


    // $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $fullName = filter_var($_POST['full-name'], FILTER_SANITIZE_STRING);
    $userName = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_URL);

    $username = $_SESSION['username'];

    $query = 'UPDATE users
    SET name = :fullname,  username = :username, email = :email
    WHERE username = :username';

    $statement = $pdo->prepare($query);

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    // $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->bindParam(':fullname', $fullName, PDO::PARAM_STR);
    $statement->bindParam(':username', $userName, PDO::PARAM_STR);
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->execute();

    redirect('/views/profile.php');
}
