<?php
session_start();

include('connection.php');

if(isset ($_POST['submit']))
{
   $sql="select * from users where uname='".$_POST['uname']."'AND upwd='".$_POST['upwd']."'";
   $result=mysqli_query($conn, $sql);
   $data=mysqli_fetch_array($result);

   if(!empty($data))
   {
        $_SESSION['username']=$data['uname'];
        $_SESSION['user_role']=$data['role'];
        header('location:dashboard.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>

<div class="container mt-3">
  <h2>HAL SECURITY LOGIN FORM</h2>
  <form method="post">
    <div class="mb-3 mt-3">
      <label for="email">Username:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter Username" name="uname">
    </div>
    <div class="mb-3">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="upwd">
    </div>

    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>
