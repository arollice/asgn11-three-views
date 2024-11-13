<?php
require_once('../private/initialize.php');
session_start();

if (is_post_request()) {

  echo "<pre>";
  print_r($_POST);  // Debugging the form data
  echo "</pre>";

  $bird = new Bird($_POST);

  error_log("Bird object created: " . print_r($bird, true));  // Debugging Bird object

  $result = $bird->create();

  if ($result) {
    $new_id = $bird->id;
    $_SESSION['message'] = 'This bird was created successfully!';
    redirect_to(url_for('/public/birds.php/show.php?id=' . $new_id));
  } else {
    $_SESSION['message'] = 'There was an error creating the bird.';
  }
}


// Page title and header
$page_title = 'Create a New Bird';
include(SHARED_PATH . '/public_header.php');
?>

<h2>Create a New Bird</h2>

<form action="new.php" method="POST">
  <label for="common_name">Common Name:</label>
  <input type="text" name="common_name" id="common_name" required><br>

  <label for="habitat">Habitat:</label>
  <input type="text" name="habitat" id="habitat" required><br>

  <label for="food">Food:</label>
  <input type="text" name="food" id="food" required><br>

  <label for="conservation_id">Conservation Status:</label>
  <select name="conservation_id" id="conservation_id">
    <option value="1">Low concern</option>
    <option value="2">Moderate concern</option>
    <option value="3">Extreme concern</option>
    <option value="4">Extinct</option>
  </select><br>

  <label for="backyard_tips">Backyard Tips:</label>
  <textarea name="backyard_tips" id="backyard_tips"></textarea><br>

  <button type="submit">Create Bird</button>
</form>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
