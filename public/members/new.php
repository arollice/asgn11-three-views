<?php
require_once('../../private/initialize.php');

if (is_post_request()) {
  $args = $_POST['member'] ?? [];

  $member = new Member($args);
  error_log(print_r($member, true));
  $result = $member->save();

  if ($result === true) {
    $new_id = $member->id;
    $session->message('This user was created successfully.');
    redirect_to(url_for('members/show.php?id=' . $new_id));
  } else {
    // Show errors
    $errors = $member->errors;
  }
} else {
  // Display Form
  $member = new Member();
}
?>

<?php $page_title = 'Create User'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div class="member-create">
  <h1>Create User</h1>

  <?php echo display_errors($member->errors); ?>

  <form action="<?php echo url_for('members/new.php'); ?>" method="post">
    <?php include('form_fields.php'); ?>
    <div>
      <input type="submit" value="Create User">
    </div>
  </form>
</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
