<?php require APP_ROOT . '/views/inc/header.php'; ?>

<a href="<?php echo URL_ROOT;?>/posts" class="btn btn-light"><li class="fa fa-backward">Back</li></a>
<br>
<h1><?php echo $data['post']->title?></h1>
 <div class="bg-secondary text-white p-2 mb-3">
     Wirttin by : <?php echo $data['user']->name?> On <?php echo $data['post']->created_at?>
 </div>
 <p><?php echo $data['post']->body?></p>
 <?php if ($data['post']->user_id == $_SESSION['user_id']):?>
    <hr>
    <a href="<?php echo URL_ROOT;?>/posts/edit/<?php echo $data['post']->id;?>" class="btn btn-dark">Edit</a>
    <br>
    <form class="float-right" method="post" action="<?php echo URL_ROOT;?>/posts/delete/<?php echo $data['post']->id;?>">
    <input type="submit" value="delete" class="btn btn-danger">
    </form>
<?php endif;?>
<?php require APP_ROOT . '/views/inc/footer.php'; ?>
