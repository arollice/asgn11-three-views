<?php
require_once('../../private/initialize.php');

if (is_post_request()) {
  // Only collect fields relevant for signup
  $args = [
    'first_name' => $_POST['first_name'] ?? '',
    'last_name' => $_POST['last_name'] ?? '',
    'email' => $_POST['email'] ?? '',
    'username' => $_POST['username'] ?? '',
    'password' => $_POST['password'] ?? '',
    'confirm_password' => $_POST['confirm_password'] ?? ''
    // Do not include 'user_level'; it defaults to 'm' in the constructor
  ];

  $member = new Member($args);
  error_log(print_r($member, true));
  $result = $member->save();

  if ($result === true) {
    $new_id = $member->id;
    $session->message('Sign up successful. Welcome!');
    $session->login($member); // Log in the user after successful signup
    redirect_to(url_for('members/index.php'));
  } else {
    // Show errors
    $errors = $member->errors;
  }
} else {
  // Display Form
  $member = new Member();
}
?>

<?php $page_title = 'Sign Up'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div class="member-create">
  <h1>Sign Up</h1>

  <?php echo display_errors($member->errors); ?>

  <form action="<?php echo url_for('members/signup.php'); ?>" method="post">
    <dl>
      <dt>First Name</dt>
      <dd><input type="text" name="first_name" value="<?php echo h($member->first_name); ?>" /></dd>
    </dl>
    <dl>
      <dt>Last Name</dt>
      <dd><input type="text" name="last_name" value="<?php echo h($member->last_name); ?>" /></dd>
    </dl>
    <dl>
      <dt>Email</dt>
      <dd><input type="email" name="email" value="<?php echo h($member->email); ?>" /></dd>
    </dl>
    <dl>
      <dt>Username</dt>
      <dd><input type="text" name="username" value="<?php echo h($member->username); ?>" /></dd>
    </dl>
    <dl>
      <dt>Password</dt>
      <dd><input type="password" name="password" value="" /></dd>
    </dl>
    <dl>
      <dt>Confirm Password</dt>
      <dd><input type="password" name="confirm_password" value="" /></dd>
    </dl>
    <div>
      <input type="submit" value="Sign Up">
    </div>
  </form>
</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
