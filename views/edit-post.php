<?php

declare(strict_types=1);

require __DIR__.'/../views/header.php';

if (isset($_SESSION['user'])):

    $id = $_SESSION['user']['id'];

    $posts = getPostInfo($pdo);

    foreach ($posts as $post) {
        $postId = $post['post_id'];
        $oldDescription = $post['description'];
    }

?>

 <!-- EDIT POST -->
<div class="container">
    <form class="form-horizontal" method="post" enctype="multipart/form-data" action="/../app/posts/update.php">
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">New Description</span>
          </div>
          <input type="hidden" name="post-id" value="<?php echo $postId;?>" >
          <textarea class="form-control" name="description-update" aria-label="With textarea"><?php echo $oldDescription ?></textarea>
        </div>
        <div class="form-group upload">
            <button type="submit" name="post-update" class="btn btn-primary upload-button" value="Upload">
            <span class="add">Update</span>
        </div>
    </form>
</div>
<!-- EDIT POST END-->

 <!-- DELETE POST -->
<div class="form-group upload">
    <form action="/../app/posts/delete.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="postId" value="<?php echo $post['post_id'];?>" >
        <button type="submit" name="delete-post" class="btn btn-primary upload-button" >Delete</button>
    </form>
</div>
<!-- DELETE POST END-->


<?php endif;

require __DIR__.'/../views/footer.php'; ?>
