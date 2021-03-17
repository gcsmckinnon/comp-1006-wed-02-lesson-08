<?php

  require_once('header.php');
  require_once('connect.php');

  // Sanitization
  $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
  $first_name = filter_input(INPUT_POST, 'fname');
  $last_name = filter_input(INPUT_POST, 'lname');
  $age = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT);
  $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
  $url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL);

  // Validation
  $errors = [];

  if (!$first_name) {
    array_push($errors, "First name is required");
  }

  if (!$last_name) {
    array_push($errors, "Last name is required");
  }

  if (!$email) {
    array_push($errors, "Email is required and must be in the correct format");
  }
  
  if (!empty($_POST['age']) && !$age) {
    array_push($errors, "Age must be an integer");
  }

  if (!empty($_POST['url']) && !$url) {
    array_push($errors, "URL must be in the correct format");
  }

  if (count($errors) > 0) {
    foreach($errors as $error) {
      echo "<p class='text-alert'>{$error}</p>";
    }
  }

  // Sanitization
  $first_name = filter_var($first_name, FILTER_SANITIZE_STRING);
  $last_name = filter_var($last_name, FILTER_SANITIZE_STRING);
  $age = filter_var($age, FILTER_SANITIZE_NUMBER_INT);
  $email = filter_var($email, FILTER_SANITIZE_EMAIL);
  $url = filter_var($url, FILTER_SANITIZE_URL);

  // Normalization
  $first_name = mb_convert_case($first_name, MB_CASE_TITLE);
  $last_name = mb_convert_case($last_name, MB_CASE_TITLE);

  try {
    if (empty($id)) {
      $sql = "INSERT INTO contacts (fname, lname, email, age, url) VALUES (:first_name, :last_name, :email, :age, :url)";
    } else {
      $sql = "UPDATE contacts SET fname = :first_name, lname = :last_name, email = :email, age = :age, url = :url WHERE id = :id";
    }

    $stmt = $db->prepare($sql);

    $stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);
    $stmt->bindParam(':last_name', $last_name, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':age', $age, PDO::PARAM_INT);
    $stmt->bindParam(':url', $url, PDO::PARAM_STR);

    if (!empty($id)) {
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    }

    $stmt->execute();

    if (!$stmt) {
      throw new Exception($db->errorInfo());
    }

    
    $stmt->closeCursor();
    
    header("Location: index.php");
    exit;
  } catch (Exception $e) {
    echo "<p class='text-alert'>{$e->getMessage()}</p>";
  }

  require_once('footer.php');

?>