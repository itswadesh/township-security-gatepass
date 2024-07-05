<?php
session_start(); // Start session to use $_SESSION variables

include('connection.php');

if(isset($_POST['submit'])) {
    date_default_timezone_set("Asia/Kolkata");

    $sql = "INSERT INTO users (uname, upwd, role, added_date) 
            VALUES ('".$_POST['uname']."', '".$_POST['upwd']."', '".$_POST['role']."', '".date('Y-m-d h:i:s')."')";

    $result = mysqli_query($conn, $sql);

    if($result) {
        $_SESSION['success'] = 'Inserted successfully!';
        echo '<script>alert("Inserted successfully!");</script>'; // JavaScript alert
        header('Location: registration.php');
        exit;
    } else {
        echo "Error: ". $sql. "<br>". mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registration Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="registration.css">
</head>
<body>

<div class="container mt-3">
  <h2><strong>HAL SECURITY REGISTRATION FORM</strong></h2>
  <?php if(isset($_SESSION['success'])) {?>
  <div class="alert alert-success" id="success-message">
    <?php echo $_SESSION['success'];?>
  </div>
  <?php unset($_SESSION['success']); }?>
 
 <script>
  setTimeout(function() {
    document.getElementById("success-message").style.display = "none";
  }, 3000);
</script>

  <form method="post">
    <div class="mb-3 mt-3">
      <label for="email">Username:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter Username" name="uname">
    </div>
    <div class="mb-3">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="upwd">
    </div>

    <div class="mb-3">
      <label for="pwd">Role:</label>
      <select class="form-control" name="role">
        <option>Select Role</option>
        <option value="supervisor">Supervisor</option>
        <option value="controller">Controller</option>
      </select>
    </div>

    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>