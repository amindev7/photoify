<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

if (isset($_POST['post_id']))
{
	if (filter_var($_POST['post_id'], FILTER_VALIDATE_INT))
	{
		$user = $_SESSION['user']['id'];
		$postId = $_POST['post_id'];
		$query = "SELECT * FROM likes
        WHERE
        user_id = :user_id AND post_id = :post_id";

		$statement = $pdo->prepare($query);
		if (!$statement)
		{
			die(var_dump($pdo->errorInfo()));
		}
		$statement->bindParam(':user_id', $user, PDO::PARAM_INT);
		$statement->bindParam(':post_id', $postId, PDO::PARAM_INT);
		$statement->execute();
		$likes = $statement->fetch(PDO::FETCH_ASSOC);

        // NO LIKES //
		if (!$likes)
		{
            $query = "INSERT INTO likes(user_id, post_id)
            VALUES
            (:user_id, :post_id)";

            $statement = $pdo->prepare($query);
            if (!$statement)
            {
                die(var_dump($pdo->errorInfo()));
            }
            $statement->bindParam(':user_id', $user, PDO::PARAM_INT);
            $statement->bindParam(':post_id', $postId, PDO::PARAM_INT);
            $statement->execute();
            $likes = $statement->fetch(PDO::FETCH_ASSOC);
			redirect('/');

		} else {

            $query = "DELETE FROM likes
            WHERE
            user_id = :user_id AND post_id = :post_id";

            $statement = $pdo->prepare($query);
            if (!$statement)
            {
                die(var_dump($pdo->errorInfo()));
            }
            $statement->bindParam(':post_id', $postId, PDO::PARAM_INT);
            $statement->bindParam(':user_id', $user, PDO::PARAM_INT);
            $statement->execute();
            $dislike = $statement->fetch(PDO::FETCH_ASSOC);
            redirect('/');
		}
	}
}
