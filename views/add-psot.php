<?php require __DIR__.'/../views/header.php'; ?>

<?php if (isset($_SESSION['user'])): ?>

    <div class="container">
        <form class="form-horizontal" role="form">
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Title" aria-label="Title" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="inputGroupFile02">
                <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Upload Image</label>
              </div>
              <div class="input-group-append">
                <span class="input-group-text" id="inputGroupFileAddon02">Upload</span>
              </div>
            </div>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">Description</span>
              </div>
              <textarea class="form-control" aria-label="With textarea"></textarea>
            </div>
            <div class="form-group upload">
                <input type="button" class="btn btn-primary upload-button" value="Upload">
              </div>
            </div>
        </form>
    </div>
<?php endif; ?>
<?php require __DIR__.'/../views/footer.php'; ?>
