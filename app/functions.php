<?php

declare(strict_types=1);

if (!function_exists('redirect')) {
    /**
     * Redirect the user to given path.
     *
     * @param string $path
     *
     * @return void
     */
    function redirect(string $path)
    {
        header("Location: ${path}");
        exit;
    }
}

/**
 * [alert description]
 * @return [type] [description]
 */
function alert()
{
	if (isset($_SESSION['success'])) {
		echo '<div class="alert alert-primary" role="alert">'.$_SESSION['success'].'</div>';
		unset($_SESSION['success']);
    }
}
/**
 * [isOwnerOfPost description]
 * @param  int  $post [description]
 * @param  int  $user [description]
 * @return bool       [description]
 */

function isOwnerOfPost(int $post, int $user): bool
{
  return $post === $user;
}

/**
 * [getPostInfo description]
 * @param  PDO   $pdo [description]
 * @return array      [description]
 */

function getPostInfo(PDO $pdo) :array
{
    $query = 'SELECT p.id as post_id,
    p.description, p.created_at, p.post_img,
    u.username, u.id as user_id, u.profile_img
    FROM posts p
    INNER JOIN users u
    WHERE u.id = p.user_id';

    $statement = $pdo->prepare($query);
    if (!$statement)
    {
        die(var_dump($pdo->errorInfo()));
    }
    $statement->execute();

    return $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
}
