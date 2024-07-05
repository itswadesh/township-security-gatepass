<?php
include('connection.php');

if (isset($_POST['id']) && isset($_POST['uname']) && isset($_POST['role'])) {
    $id = $_POST['id'];
    $uname = $_POST['uname'];
    $role = $_POST['role'];

    $query = "UPDATE users SET uname =?, role =? WHERE id =?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'ssi', $uname, $role, $id);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        mysqli_stmt_close($stmt);
        header("Location: userlist.php");
        exit;
    } else {
        mysqli_stmt_close($stmt);
        echo "Error updating user";
    }
} else {
    echo "Invalid data";
}
?>