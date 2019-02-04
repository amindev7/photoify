<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

// Check if both email and password exists in the POST request.

if (isset($_POST['email'], $_POST['password'])) {
    $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));

    // Prepare, bind email parameter and execute the database query.
    $statement = $pdo->prepare('SELECT * FROM users WHERE email = :email');
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->execute();

    // Fetch the user as an associative array.
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        $_SESSION['error'] = 'Something went wrong, try again!';
        redirect('/index.php');
    }

    if (password_verify($_POST['password'], $user['password'])) {
        $_SESSION['user'] = $user;
        unset($user['password']);
        redirect('/');
    } else {
        $_SESSION['error'] = 'You have enterd a wrong password!';
        redirect('/');
    }
}

//SIGN UP ?
if (isset($_POST['username'], $_POST['email-reg'], $_POST['password-reg'], $_POST['full-name'])) {
    $emailReg = trim(filter_var($_POST['email-reg'], FILTER_SANITIZE_EMAIL));
    $fullName = trim(filter_var($_POST['full-name'], FILTER_SANITIZE_STRING));
    $userName = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
    $password = trim(password_hash($_POST['password-reg'], PASSWORD_DEFAULT));
    $profileImage = 'default-profile.jpg';

    $query = 'INSERT INTO users
    (email, name, username, profile_img, password)
    VALUES
    (:emailReg, :fullname, :username, :profile_img, :password)';

    if (filter_var($emailReg, FILTER_VALIDATE_EMAIL) === false) {
        $_SESSION['error'] = 'The email is not valid';
        redirect('/');
    }
    $statement = $pdo->prepare($query);

    // Bind parameters to statement variables
    $statement->bindParam(':emailReg', $emailReg, PDO::PARAM_STR);
    $statement->bindParam(':fullname', $fullName, PDO::PARAM_STR);
    $statement->bindParam(':username', $userName, PDO::PARAM_STR);
    $statement->bindParam(':password', $password, PDO::PARAM_STR);
    $statement->bindParam(':profile_img', $profileImage, PDO::PARAM_STR);
    $statement->execute();

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
        $_SESSION['error'] = 'Something went wrong, try again!';
    } else {
        $_SESSION['success'] = 'Registration successfully completed!';
        redirect('/');
        exit;
    }
}
