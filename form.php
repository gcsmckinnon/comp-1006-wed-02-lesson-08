<form action="process.php" method="post">
  <?php if (isset($id)): ?>
    <input type="hidden" name="id" value="<?= $id ?>">
  <?php endif ?>

  <div class="form-group">
    <label for="fname">First Name:</label>
    <input type="text" name="fname" class="form-control" value="<?= $row['fname'] ?? null ?>">
  </div>

  <div class="form-group">
    <label for="lname">Last Name:</label>
    <input type="text" name="lname" class="form-control" value="<?= $row['lname'] ?? null ?>">
  </div>

  <div class="form-group">
    <label for="email">Email:</label>
    <input type="text" name="email" class="form-control" value="<?= $row['email'] ?? null ?>">
  </div>

  <div class="form-group">
    <label for="age">Age:</label>
    <input type="text" name="age" class="form-control" value="<?= $row['age'] ?? null ?>">
  </div>

  <div class="form-group">
    <label for="url">Personal Page:</label>
    <input type="text" name="url" class="form-control" value="<?= $row['url'] ?? null ?>">
  </div>

  <div class="form-group">
    <button class="btn btn-large btn-primary">Submit</button>
  </div>
</form>