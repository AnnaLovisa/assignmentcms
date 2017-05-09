
<?php require VIEW_ROOT . '/templates/header.php'; ?>


<div class="container mt-5">
  <?php if(!$data): ?>
    <p>No page found, sorry.</p>
  <?php else: ?>
      <div class="row justify-content-center">
        <div class="col-sm-12 col-md-8">
          <!-- Title -->
          <h1><?php echo $data['post_title']; ?></h1>
            <!-- Author -->
            <p class="lead">
              by <a href="#"><?php echo $data['username']; ?></a>
            </p>
            <hr>
            <!-- Date/Time -->
            <p><span class="glyphicon glyphicon-time"></span>
              Posted on - <?php echo $data['created_time']; ?>
              <?php if($data['updated_time']): ?>
                - last updated <?php echo $data['updated_time']; ?>
              <?php endif; ?></p>
              <hr>
              <!-- Post Content -->
              <p class="lead"><?php echo $data['post_content']; ?></p>
              <?php if($_SESSION == true): ?>
                <?php if($_SESSION['user_id'] == $data['user_id'] OR $_SESSION['admin'] == true): ?>
                  <a href="<?php echo BASE_URL; ?>/delete_post.php?id=<?php echo $data['post_id']; ?>">Delete post</a>
                  <?php if($_SESSION['user_id'] == $data['user_id']): ?>
                    <a href="<?php echo BASE_URL; ?>/edit_post.php?id=<?php echo $data['post_id']; ?>">Edit post</a>
                  <?php endif; ?>
                <?php endif; ?>
              <?php endif; ?>
              <?php if($_SESSION == true): ?>
                <form action="<?php echo BASE_URL; ?>/app/add_like.php?type=post&id=<?php echo $data['post_id']; ?>" method="POST">
                  <button type="submit" class="btn btn-primary">Like</button>
                </form>
              <?php endif; ?>
              <hr>
              <!-- Comments Form -->
              <div class="well">
                <h4>Leave a Comment:</h4>
                <form role="form">
                  <div class="form-group">
                    <textarea class="form-control" rows="3"></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>
            </div>
          </div>
      <?php endif; ?>
  </div>


<?php require VIEW_ROOT . '/templates/footer.php'; ?>
