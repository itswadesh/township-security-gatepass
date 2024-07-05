<?php
include('connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT uname, role FROM users WHERE id =?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $uname, $role);
    mysqli_stmt_fetch($stmt);

    // Display the user data in a form for editing
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit User</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-3">
    <h2>Edit User</h2>

    <form action="update_user.php" method="post">
        <input type="hidden" name="id" value="<?= $id?>">
        <div class="mb-3">
            <label for="uname" class="form-label">Username:</label>
            <input type="text" class="form-control" id="uname" name="uname" value="<?= $uname?>">
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Role:</label>
            <input type="text" class="form-control" id="role" name="role" value="<?= $role?>">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

</body>
</html>
<?php
    mysqli_stmt_close($stmt);
} else {
    echo "Invalid ID";
}
?>