<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

$errors = [];

// Check if both email and password exists in the POST request.

if (isset($_POST['email'], $_POST['password'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    // if (empty($email)) {
    //     array_push($errors, "Username is required");
    //  }
    //  else {

    // Prepare, bind email parameter and execute the database query.
    $statement = $pdo->prepare('SELECT * FROM users WHERE email = :email');
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->execute();

    // Fetch the user as an associative array.
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    // If we couldn't find the user in the database, redirect back to the login
    // page with our custom redirect function.
    if (!$user) {
        redirect('/index.php');
    }
    // if ($user) { // if user exists
    //   if ($user['username'] === $username) {
    //     array_push($errors, "Username already exists");
    //   }
    //
    //   if ($user['email'] === $email) {
    //     array_push($errors, "email already exists");
    //   }

    // If we found the user in the database, compare the given password from the
    // request with the one in the database using the password_verify function.
    if (password_verify($_POST['password'], $user['password'])) {
        // If the password was valid we know that the user exists and provided
        // the correct password. We can now save the user in our session.
        // Remember to not save the password in the session!
        unset($user['password']);

        $_SESSION['user'] = $user;
    }
   }

//SIGN UP ?
if (isset($_POST['username'], $_POST['email-reg'], $_POST['password-reg'], $_POST['full-name'])) {


    $emailReg = filter_var($_POST['email-reg'], FILTER_SANITIZE_EMAIL);
    $fullName = filter_var($_POST['full-name'], FILTER_SANITIZE_STRING);
    $userName = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password = password_hash($_POST['password-reg'], PASSWORD_DEFAULT);

    $query = "INSERT INTO users (email, name, username, password) VALUES (:emailReg, :fullname, :username, :password)";
    $statement = $pdo->prepare($query);

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    // Bind parameters to statement variables

    $statement->bindParam(':emailReg', $emailReg, PDO::PARAM_STR);
    $statement->bindParam(':fullname', $fullName, PDO::PARAM_STR);
    $statement->bindParam(':username', $userName, PDO::PARAM_STR);
    $statement->bindParam(':password', $password, PDO::PARAM_STR);
    $statement->execute();
    redirect('/index.php');
    // $reg = $_SESSION['full-name'];
}
redirect('/');
