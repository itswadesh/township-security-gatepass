<?php
include('connection.php');

$query = "SELECT uname, role, id FROM users";
$stmt = mysqli_prepare($conn, $query);

if (!$stmt) {
    die("Statement preparation failed: ". mysqli_error($conn));
}

if (!mysqli_stmt_execute($stmt)) {
    echo "Execute failed: ". mysqli_stmt_error($stmt);
    exit;
}

mysqli_stmt_bind_result($stmt, $uname, $role, $id);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>USERS LIST</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .actions {
            text-align: center; /* center the actions */
        }
    </style>
</head>
<body>

<div class="container mt-3">
    <h2>REGISTRATION USERS LIST</h2>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Sr.No</th>
            <th>Username</th>
            <th>Role</th>
            <th>
                <div class="actions">
                    Actions
                </div>
            </th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 1;
        while (mysqli_stmt_fetch($stmt)) {?>
            <tr>
                <td><?= $i?></td>
                <td><?= $uname?></td>
                <td><?= $role?></td>
                <td class="actions">
                    <button type="button" class="btn btn-primary" onclick="location.href='edit_user.php?id=<?= $id?>'">Edit</button>
                    <button type="button" class="btn btn-danger" onclick="location.href='delete_user.php?id=<?= $id?>'">Delete</button>
                    <button type="button" class="btn btn-warning" onclick="location.href='reset_password.php?id=<?= $id?>'">Reset Password</button>
                </td>
            </tr>
            <?php $i++; }?>
        </tbody>
    </table>
</div>

</body>
</html>

<?php
mysqli_stmt_close($stmt);
?>