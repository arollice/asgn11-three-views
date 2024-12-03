<?php require_once('../../private/initialize.php'); ?>

<?php
if (!isset($_GET['id'])) {
  redirect_to(url_for('index.php'));
}

$id = $_GET['id'];
$member = Member::find_by_id($id);
if ($member == false) {
  redirect_to(url_for('index.php'));
}

if (is_post_request()) {
  //Delete member
  $result = $member->delete();

  $_SESSION['message'] = 'This user was deleted successfully.';
  redirect_to(url_for('birds.php'));
} else {
  //Display form
}

?>

<?php $page_title = 'Delete Member'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div class='content'>
  <h1>Delete User</h1>

  <p>Are you sure you want to delete this user?</p>
  <p class='item'>Full name: <?php echo h($member->get_name()); ?></p>
  <p class='item'>Username: <?php echo h($member->username); ?></p>

  <form action="<?php echo url_for('delete.php?id=' . h(u($id))); ?>" method="post">

    <div id='operations'>
      <input type="submit" name="commit" value="Delete Member">

    </div>
  </form>
</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
