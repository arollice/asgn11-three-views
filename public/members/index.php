<?php require_once('../../private/initialize.php'); ?>

<?php $members = Member::find_all(); ?>
<?php $page_title = 'Members'; ?>
<?php if (empty($members)) { ?>
  <tr>
    <td colspan="8">No users found.</td>
  </tr>
<?php } ?>


<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="content">
  <div class="members_listing">
    <h1>Users</h1>

    <div class="actions">
      <a class="action" href="<?php echo url_for('/members/new.php'); ?>">Add User</a>
    </div>
    <table class="list">
      <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Username</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      </tr>

      <?php foreach ($members as $member) { ?>
        <tr>
          <td><?php echo h($member->id); ?></td>
          <td><?php echo h($member->first_name); ?></td>
          <td><?php echo h($member->last_name); ?></td>
          <td><?php echo h($member->email); ?></td>
          <td><?php echo h($member->username); ?></td>
          <td><a href="detail.php?id=<?php echo $member->id; ?>">View</a></td>
          <td><a href="edit.php?id=<?php echo $member->id; ?>">Edit</a></td>
          <td><a href="<?php echo url_for('delete.php?id=' . h(u($member->id))); ?>">Delete</a></td>
        <?php } ?>
        </tr>
    </table>
  </div>
</div>

<ul>
  <li><a href="<?php echo url_for('/birds.php'); ?>">View Our Inventory</a></li>
  <li><a href="<?php echo url_for('/about.php'); ?>">About Us</a></li>
</ul>


<?php include(SHARED_PATH . '/public_footer.php'); ?>
