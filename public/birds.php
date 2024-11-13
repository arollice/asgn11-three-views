<?php
require_once('../private/initialize.php');
$page_title = 'Bird List';
include(SHARED_PATH . '/public_header.php');
?>

<h2>Bird inventory</h2>
<p>This is a short list -- start your birding!</p>

<!-- create a link to add a bird -->
<p><a href="new.php">Add a New Bird</a></p>


<table border="1">
  <tr>
    <th>Name</th>
    <th>Habitat</th>
    <th>Food</th>
    <th>Conservation</th>
    <th>Backyard Tips</th>
    <th>&nbsp;</th>
  </tr>

  <?php

  // Create a new bird object that uses the find_all() method

  $birds = Bird::find_all();

  foreach ($birds as $bird) {

  ?>
    <tr>
      <td><?php echo h($bird->common_name); ?></td>
      <td><?php echo h($bird->habitat); ?></td>
      <td><?php echo h($bird->food); ?></td>
      <td><?php echo h($bird->conservation()); ?></td>
      <td><?php echo h($bird->backyard_tips); ?></td>
      <td><a href="detail.php?id=<?php echo $bird->id; ?>">View</a></td>
      <td><a href="edit.php?id=<?php echo $bird->id; ?>">Edit</a></td>
      <td><a href="<?php echo url_for('delete.php?id=' . h(u($bird->id))); ?>">Delete</a></td>

    </tr>
  <?php } ?>

</table>


<?php include(SHARED_PATH . '/public_footer.php'); ?>
