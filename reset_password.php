<?php
include('connection.php');

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header('Location: userlist.php');
    exit;
}

$user_id = $_GET['id'];

$query = "SELECT uname FROM users WHERE id =?";
$stmt = mysqli_prepare($conn, $query);

if (!$stmt) {
    die("Statement preparation failed: ". mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, 'i', $user_id);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $uname);

if (!mysqli_stmt_fetch($stmt)) {
    header('Location: userlist.php');
    exit;
}

mysqli_stmt_close($stmt);

if (isset($_POST['submit'])) {
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if ($new_password!= $confirm_password) {
        $error = "Passwords do not match";
    } else {
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        $query = "UPDATE users SET upwd =? WHERE id =?";
        $stmt = mysqli_prepare($conn, $query);
        
        if (!$stmt) {
            die("Statement preparation failed: ". mysqli_error($conn));
        }
        
        mysqli_stmt_bind_param($stmt, 'si', $hashed_password, $user_id);
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_affected_rows($stmt) > 0) {
            $success = "Password reset successfully for user $uname";
        } else {
            $error = "Failed to reset password";
        }

        mysqli_stmt_close($stmt);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reset Password</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
    <h2>Reset Password for <?= $uname?></h2>

    <?php if (isset($success)) {?>
        <div class="alert alert-success"><?= $success?></div>
    <?php } elseif (isset($error)) {?>
        <div class="alert alert-danger"><?= $error?></div>
    <?php }?>

    <form action="" method="post">
        <div class="mb-3">
            <label for="new_password" class="form-label">New Password</label>
            <input type="password" class="form-control" id="new_password" name="new_password" required>
        </div>
        <div class="mb-3">
            <label for="confirm_password" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Reset Password</button>
    </form>
</div>

</body>
</html>