<?php require APP_ROOT . '/views/inc/header.php'; ?>
<?php flash('post_msg');?>
  <div class="row mb-3">
    <div class="col-md-6">
      <h1>Posts</h1>
    </div>
    <div class="col-md-6">
      <a href="<?php echo URL_ROOT; ?>/posts/add" class="btn btn-primary pull-right">
        <i class="fa fa-pencil"></i> Add Post
      </a>
    </div>
  </div>

  <?php foreach($data['posts'] as $post):?>
    <div class="card card-body mb-3">
      <h4 class="card-title"><?php echo $post->title?></h4>
      <div class="bg-light p-2 mb-3">
        written by : <?php echo $post->name.' on '.$post->postCreated ;?> 
      </div>
      <div class="card-text ">
        <?php echo $post->body;?>
        <br>
        <a href="<?php echo URL_ROOT;?>/posts/show/<?php echo $post->postId;?>" class="btn btn-dark mt-3">More</a>
      </div>
    </div>
  <?php endforeach?>
<?php require APP_ROOT . '/views/inc/footer.php'; ?>