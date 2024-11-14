<?php require_once('../private/initialize.php'); ?>

<?php
if (!isset($_GET['id'])) {
  redirect_to(url_for('index.php'));
}

$id = $_GET['id'];

$bird = Bird::find_by_id($id);

if (is_post_request()) {

  $args = $_POST['bird'];


  $bird->merge_attributes($args);
  $result = $bird->save();

  if ($result === true) {
    $_SESSION['message'] = 'This bird was updated successfully.';
    redirect_to(url_for('show.php?id=' . $id));
  } else {
    //show errors

  }
} else {
  // display form 

}
?>

<?php $page_title = 'Edit Bird'; ?>

<?php include(SHARED_PATH . '/public_header.php'); ?>

<div class="content">
  <h1>Edit Bird</h1>

  <form action="<?php echo url_for('edit.php?id=' . h(u($id))); ?>" method="post">

    <?php include('form_fields.php'); ?>
    <div>
      <input type="submit" value="Edit Bird">
    </div>
  </form>

</div>



<?php include(SHARED_PATH . '/public_footer.php'); ?>
