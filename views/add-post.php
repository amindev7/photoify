<?php

declare(strict_types=1);

require __DIR__.'/../views/header.php';

 if (isset($_SESSION['user'])): ?>
    <div class="container">
        <form class="form-horizontal" method="post" enctype="multipart/form-data" action="/app/posts/store.php">
            <div class="input-group mb-3">
              <div class="custom-file">
                <input type="file" name="post-img" class="custom-file-input" id="inputGroupFile02">
                <label class="custom-file-label"  for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Upload Image</label>
              </div>
            </div>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">Description</span>
              </div>
              <textarea class="form-control" name="description" aria-label="With textarea"></textarea>
            </div>
            <div class="form-group upload">
                <button type="submit" name="post-upload" class="btn btn-primary upload-button" value="Upload">
                <span class="add">Upload</span>
            </div>
        </form>
    </div>
<?php endif; ?>
<?php require __DIR__.'/../views/footer.php'; ?>
