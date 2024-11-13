<?php
require_once('../../../private/initialize.php');

// Ensure the ID is passed in the URL; default to 1 if not provided
$id = $_GET['id'] ?? '1'; // Use a default value (e.g., 1) if no ID is given

// Debugging: Check if ID is correct
echo "Requested ID: " . h($id) . "<br>";

// Fetch the bird using the ID from the database
$bird = Bird::find_by_id($id);

// Check if a bird is found
if (!$bird) {
  echo "No bird found with ID: " . h($id) . "<br>";
  redirect_to(url_for('/public/birds.php')); // Redirect to birds list page if bird not found
}

$page_title = 'Bird Details: ' . h($bird->common_name);
include(SHARED_PATH . '/public_header.php');
?>

<h2>Details for <?php echo h($bird->common_name); ?></h2>

<div>
  <p><strong>Common Name:</strong> <?php echo h($bird->common_name); ?></p>
  <p><strong>Habitat:</strong> <?php echo h($bird->habitat); ?></p>
  <p><strong>Food:</strong> <?php echo h($bird->food); ?></p>
  <p><strong>Conservation Status:</strong> <?php echo h($bird->conservation()); ?></p>
  <p><strong>Backyard Tips:</strong> <?php echo h($bird->backyard_tips); ?></p>
</div>

<p><a href="edit.php?id=<?php echo h($bird->id); ?>">Edit this Bird</a></p>
<p><a href="delete.php?id=<?php echo h($bird->id); ?>">Delete this Bird</a></p>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
