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
        <?php if ($session->is_logged_in()) { ?>
          <li>User: <?php echo h($session->username); ?></li>
        <?php } ?>

        <?php if ($session->is_logged_in() && $session->is_admin()) { ?>
          <li><a href="<?php echo url_for('members/index.php'); ?>">View Members</a></li>
        <?php } ?>

        <li><a href="<?php echo url_for('members/logout.php'); ?>">Logout</a></li>
      </ul>
    <?php } ?>
    <?php echo display_session_message(); ?>
  </header>
