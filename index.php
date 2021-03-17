<?php

  require_once('connect.php');

  $sql = "SELECT * FROM contacts";
  $rows = $db->query($sql)->fetchAll();

  require_once('header.php');
  
?>

<header class="my-5">
  <h1>Contacts</h1>
</header>

<hr class="my-5">

<a href="new.php" class="btn btn-lg btn-primary">Create New Contact</a>

<hr class="my-5">

<table class="table table-striped">
  <thead>
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Age</th>
      <th>Personal Page</th>
      <th>Actions</th>
    </tr>
  </thead>

  <tbody>
    <?php foreach($rows as $row): ?>
      <tr>
        <td><?= $row['fname'] ?> <?= $row['lname'] ?></td>
        <td><?= $row['email'] ?></td>
        <td><?= $row['age'] ?></td>
        <td>
          <a target="_blank" href="<?= $row['url'] ?>"><?= $row['url'] ?></a>
        </td>
        <td>
          <a href="edit.php?id=<?= $row['id'] ?>">edit</a>
          |
          <a href="delete.php?id=<?= $row['id'] ?>">delete</a>
        </td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>

<?php require_once('footer.php'); ?>