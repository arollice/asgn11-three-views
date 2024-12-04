<?php require_once('../private/initialize.php'); ?>

<?php include(SHARED_PATH . '/public_header.php'); ?>

<?php //require_login(); // page access control function added to validation functions. to implements Call function on all member pages.
?>

<ul>
  <li><a href="<?php echo url_for('/birds.php'); ?>">View Our Inventory</a></li>
  <li><a href="<?php echo url_for('/members/index.php'); ?>">Members</a></li>
  <li><a href="<?php echo url_for('/about.php'); ?>">About Us</a></li>
</ul>


<?php include(SHARED_PATH . '/public_footer.php'); ?>
