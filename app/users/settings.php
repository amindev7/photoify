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
 }
}

// UPLOAD PROFILE IMAGE //

if (isset($_POST['upload-img'])) {
  // Get image name
  $image = $_FILES['profile-img']['name'];

  $userId = $_SESSION['user']['id'];

  // image file directory
  $path = "/../../images/".basename($image);

  // if (move_uploaded_file($_FILES['profile-img']['tmp_name'], $path)) {

      $query = 'SELECT * FROM images WHERE user_id = :userId';
      $stmt = $pdo->prepare($query);
      $stmt->bindParam(':userId', $userId, PDO::PARAM_STR);
      $stmt->execute();
      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      if (!$row['filepath']) {

        $query = 'INSERT INTO images
        (filepath, user_id) VALUES (:image, :userId)';

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(':image', $image, PDO::PARAM_STR);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_STR);
        $stmt->execute();
        }else {
        $sql = 'UPDATE images
        SET filepath = :image, user_id = :userId';

		$stmt = $pdo->prepare($sql);
		$stmt->bindParam(':image', $image, PDO::PARAM_STR);
		$stmt->bindParam(':userId', $userId, PDO::PARAM_STR);
		$stmt->execute();
    }
    if (!$stmt) {
    	die(var_dump($pdo->errorInfo()));
        // redirect('/views/profile.php');
      }
    // }
}


// redirect('/views/profile.php');
