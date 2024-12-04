<!doctype html>

<html lang="en">

<head>
  <title>WNC Birds <?php if (isset($page_title)) {
                      echo '- ' . h($page_title);
                    } ?></title>
  <meta charset="utf-8">
</head>

<body>

  <header>
    <h1>
      <a href="<?php echo url_for('index.php'); ?>">
        WNC Birds
      </a>
    </h1>
    <?php if ($session->is_logged_in()) { ?>
      <ul>
        <li><a href="<?php echo url_for('index.php'); ?>">Menu</a></li>
        <li><a href="<?php echo url_for('members/logout.php'); ?>">Logout</a></li>
      </ul>
    <?php } ?>
    <?php echo display_session_message(); ?>
  </header>
