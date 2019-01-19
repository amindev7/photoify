<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

//UPDATE EMAIL AND NAME

if (isset($_POST['name']) || isset($_POST['email'])) {

     $name = trim(filter_var($_POST['name'], FILTER_SANITIZE_STRING));
     $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));

     if (empty($name) || empty($email)) {
         $_SESSION['error'] = 'Please enter your email and name!';
         redirect('/views/profile.php');
     }

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

    $_SESSION['success'] = 'Your info has been updated!';
    redirect('/views/profile.php');
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
    }
    $_SESSION['success'] = 'Your password has benn changed!';
    redirect('/views/profile.php');
}else {
    $_SESSION['error'] = 'Passwords don\'t match!';
    redirect('/views/profile.php');
}
}

// UPLOAD PROFILE IMAGE //

if (isset($_POST['upload-img'], $_FILES['profile-img']))
{
  $profileImage = $_FILES['profile-img'];
  $id = $_SESSION['user']['id'];

  if ($profileImage['type'] === 'image/jpeg' || $profileImage['type'] === 'image/png')
  {
    if ($profileImage['size'] < 3000000)
    {
      $imagePath = '/../img/profile_img/';

      $imageName = time().'-'.$id.'-'.$profileImage['name'];

      move_uploaded_file($profileImage['tmp_name'], __DIR__.$imagePath.$imageName);

      $query = 'UPDATE users
      SET profile_img = :profile_img
      WHERE id = :id';

      $statement = $pdo->prepare($query);
      $statement->bindParam(':id', $id, PDO::PARAM_INT);
      $statement->bindParam(':profile_img', $imageName, PDO::PARAM_STR);
      $statement->execute();

      if (!$statement) {
      	die(var_dump($pdo->errorInfo()));
        $_SESSION['error'] = 'Something went wrong, try again!';
        }
    }
  }
}
redirect('/views/profile.php');
