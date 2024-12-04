<?php
require_once('../../private/initialize.php');

// Log out the admin
$session->log_out();

redirect_to(url_for('/members/login.php'));
?>
<a href="birds.php">Back to WNC Birds</a>
