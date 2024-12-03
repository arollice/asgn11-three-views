<?php require_once('../private/initialize.php'); ?>

<?php include(SHARED_PATH . '/public_header.php'); ?>

<ul>
  <li><a href="<?php echo url_for('/birds.php'); ?>">View Our Inventory</a></li>
  <li><a href="<?php echo url_for('/members/index.php'); ?>">User Login</a></li>
  <li><a href="<?php echo url_for('/about.php'); ?>">About Us</a></li>
</ul>


<?php include(SHARED_PATH . '/public_footer.php'); ?>
