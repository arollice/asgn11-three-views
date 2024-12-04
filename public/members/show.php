<?php require_once('../../private/initialize.php'); ?>

<?php
// Validate and fetch member
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
  $_SESSION['message'] = 'Invalid user ID.';
  redirect_to(url_for('members/index.php'));
}

$id = $_GET['id'];
$member = Member::find_by_id($id);

if (!$member) {
  $_SESSION['message'] = 'User not found.';
  redirect_to(url_for('members/index.php'));
}
?>

<?php $page_title = 'Show User: ' . h($member->first_name); ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('members/index.php'); ?>">&laquo; Back to List</a>

  <div>

    <h1>User: <?php echo h($member->full_name()); ?></h1>

    <div class="attributes">
      <dl>
        <dt>First Name:</dt>
        <dd><?php echo h($member->first_name); ?></dd>
      </dl>
      <dl>
        <dt>Last Name:</dt>
        <dd><?php echo h($member->last_name); ?></dd>
      </dl>
      <dl>
        <dt>Email:</dt>
        <dd><?php echo h($member->email); ?></dd>
      </dl>
      <dl>
        <dt>Username:</dt>
        <dd><?php echo h($member->username); ?></dd>
      </dl>
    </div>

  </div>

</div>
