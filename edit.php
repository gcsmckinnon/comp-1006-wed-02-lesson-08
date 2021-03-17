<?php
  require('connect.php');

  $id = filter_input(INPUT_GET, 'id');

  $sql = "SELECT * FROM contacts WHERE id = :id";
  $stmt = $db->prepare($sql);
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);
  $stmt->execute();
  
  $row = $stmt->fetch();
?>

<?php require_once('header.php'); ?>

<header class="my-5">
  <h1>Edit Contact</h1>
</header>

<hr class="my-5">

<?php require_once('form.php'); ?>

<?php require_once('footer.php'); ?>