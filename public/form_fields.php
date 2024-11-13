<?php
/* 
  Use the bicycles/staff/form_fields.php file as a guide 
  so your file mimics the same functionality.
 
*/
require_once('../private/initialize.php');
$page_title = 'Add New Bird';
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
