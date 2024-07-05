<?php
include('connection.php');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int) $_GET['id'];

    $query = "DELETE FROM movement WHERE id =?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "User deleted successfully!";
        // Redirect to a success page or back to the list of supervisors
        header('Location: controller_db.php');
        exit;
    } else {
        echo "Error deleting user!";
    }

    mysqli_stmt_close($stmt);
} else {
    echo "Error: Invalid ID parameter";
    exit;
}
?>