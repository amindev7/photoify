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
 * @return string [description]
 */
function alert()
{
	if (isset($_SESSION['success'])) {
		echo '<div class="alert alert-primary" role="alert">'.$_SESSION['success'].'</div>';
		unset($_SESSION['success']);
    }
}
