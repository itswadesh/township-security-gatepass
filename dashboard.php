<?php
session_start();

if(isset($_SESSION['user_role'])) {
  $role = $_SESSION['user_role'];

  if($role == 'supervisor') {
    header('Location: submit_form.html');
    exit;
  } elseif($role == 'controller') {
    header('Location: controller.html');
    exit;
  } elseif($role == 'admin') {
    header('Location: admin.html');
    exit;
  }
} else {
  header('Location: login.php');
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Users List</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

  <?php
  $role = $_SESSION['role'];

  if($role == 'supervisor') {
    header('Location: submit_form.html');
    exit;
  } elseif($role == 'controller') {
    header('Location: controller.html');
    exit;
  } elseif($role == 'admin') {
    header('Location: admin.html');
    exit;
  }?>

</body>
</html>