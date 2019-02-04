<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

// In this file we store/insert new posts in the database.

if (isset($_POST['post-upload'])) {
    $post = $_FILES['post-img'];
    $description = $_POST['description'];

    if (empty($post)) {
        $_SESSION['error'] = 'Please upload an image!';
        redirect('/views/add-post.php');
    }

    if ($post['type'] === 'image/jpeg' || $post['type'] === 'image/png' || $post['type'] === 'image/gif') {
        if ($post['size'] < 3000000) {
            $id = $_SESSION['user']['id'];
            $path = '/../img/post_img/';
            $postName = time().'-'.$id.'-'.$post['name'];
            $createdAt = date('Y-m-d H:i:s');

            move_uploaded_file($post['tmp_name'], __DIR__.$path.$postName);

            $query = 'INSERT INTO posts
      (user_id, post_img, description, created_at)
      VALUES
      (:user_id, :post_img, :description, :created_at)';

            $statement = $pdo->prepare($query);

            $statement->bindParam(':user_id', $id, PDO::PARAM_INT);
            $statement->bindParam(':post_img', $postName, PDO::PARAM_STR);
            $statement->bindParam(':description', $description, PDO::PARAM_STR);
            $statement->bindParam(':created_at', $createdAt, PDO::PARAM_STR);
            $statement->execute();

            if (!$statement) {
                die(var_dump($pdo->errorInfo()));
            }
            $_SESSION['success'] = 'Your post has been uploaded!';
            redirect('/../../index.php');
        }
    } else {
        $_SESSION['error'] = 'Please upload an image!';
        redirect('/views/add-post.php');
    }
}
redirect('/index.php');
