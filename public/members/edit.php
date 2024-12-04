<?php require_once('../../private/initialize.php'); ?>

<?php
if (!isset($_GET['id'])) {
  redirect_to(url_for('members/index.php'));
}

$id = $_GET['id'];

$member = Member::find_by_id($id);

if (is_post_request()) {

  $args = $_POST['member'];


  $member->merge_attributes($args);
  $result = $member->save();

  if ($result === true) {
    $session->message('This user was updated successfully.');
    redirect_to(url_for('members/show.php?id=' . $id));
  } else {
    //show errors

  }
} else {
  // display form 

}
?>

<?php $page_title = 'Edit User'; ?>

<?php include(SHARED_PATH . '/public_header.php'); ?>

<div class="content">
  <h1>Edit User</h1>

  <?php echo display_errors($member->errors); ?>

  <form action="<?php echo url_for('members/edit.php?id=' . h(u($id))); ?>" method="post">

    <?php include('form_fields.php'); ?>
    <div>
      <input type="submit" value="Edit User">
    </div>
  </form>

</div>



<?php include(SHARED_PATH . '/public_footer.php'); ?>
