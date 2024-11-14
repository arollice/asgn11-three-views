<?php
require_once('../private/initialize.php');

if (is_post_request()) {

  $args = $_POST['bird'];


  $bird = new Bird($args);
  $result = $bird->save();

  if ($result === true) {
    $new_id = $bird->id;
    $_SESSION['message'] = 'This bird was created successfully.';
    redirect_to(url_for('show.php?id=' . $new_id));
  } else {
    // Show errors
    $errors = $bird->errors;
  }
} else {
  // Display Form
  $bird = new Bird();
}
?>

<?php $page_title = 'Create Bird'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div class="bird-create">
  <h1>Create Bird</h1>

  <form action="<?php echo url_for('new.php'); ?>" method="post">
    <?php include('form_fields.php'); ?>
    <div>
      <input type="submit" value="Create Bird">
    </div>
  </form>
</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
