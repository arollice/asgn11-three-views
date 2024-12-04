<?php require_once('../../private/initialize.php'); ?>

<?php

// Get requested ID
$id = $_GET['id'] ?? false;

if (!$id) {
  redirect_to(url_for('members/index.php')); // Redirect to index if no ID is provided
}

// Find member using ID
$member = Member::find_by_id($id);

if (!$member) {
  redirect_to(url_for('members/index.php')); // Redirect if member not found
}

?>

<?php $page_title = 'Detail: ' . h($member->full_name()); ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="content">
  <a href="<?php echo url_for('members/index.php'); ?>">Back to Users</a>

  <dl>
    <dt>ID:</dt>
    <dd><?php echo h($member->id); ?></dd>
  </dl>
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
  <dl>
    <dt>User Level:</dt>
    <dd>
      <?php echo h($member->user_level === 'a' ? 'Admin' : 'Member'); ?>
    </dd>
  </dl>
</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
