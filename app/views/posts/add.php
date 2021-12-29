<?php require APP_ROOT . '/views/inc/header.php'; ?>
      <div class="card card-body bg-light mt-5">
        <h2>Add Post</h2>
        <form action="<?php echo URL_ROOT; ?>/posts/add" method="post">

          <div class="form-group">
            <label for="title">title: <sup>*</sup></label>
            <input type="text" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title']; ?>">
            <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="body">body: <sup>*</sup></label>
            <textarea name="body" class="form-control form-control-lg <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>" >
            <?php echo $data['body']; ?>
            </textarea>
            <span class="invalid-feedback"><?php echo $data['body_err']; ?></span>
          </div>

            
        <input type="submit" value="Add" class="btn btn-success btn-block">
        
     
        </form>
      </div>
 

<?php require APP_ROOT . '/views/inc/footer.php'; ?>