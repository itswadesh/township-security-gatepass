<?php
include('connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM users WHERE id =?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        mysqli_stmt_close($stmt);
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <title>Delete User</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        </head>
        <body>

        <div class="container mt-3">
            <h2>Delete User</h2>
            <div class="alert alert-success" role="alert">
                User deleted successfully!
            </div>
            <a href="userlist.php" class="btn btn-primary">Back to User List</a>
        </div>

        </body>
        </html>
        <?php
    } else {
        mysqli_stmt_close($stmt);
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <title>Delete User</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        </head>
        <body>

        <div class="container mt-3">
            <h2>Delete User</h2>
            <div class="alert alert-danger" role="alert">
                Error deleting user!
            </div>
            <a href="userlist.php" class="btn btn-primary">Back to User List</a>
        </div>

        </body>
        </html>
        <?php
    }
} else {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Delete User</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>

    <div class="container mt-3">
        <h2>Delete User</h2>
        <div class="alert alert-danger" role="alert">
            Invalid ID!
        </div>
        <a href="userlist.php" class="btn btn-primary">Back to User List</a>
    </div>

    </body>
    </html>
    <?php
}
?>