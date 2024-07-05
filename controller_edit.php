<?php
include('connection.php');

$id = $_GET['id'];

$query = "SELECT * FROM movement WHERE id =?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

while ($row = mysqli_fetch_assoc($result)) {
    $name = $row['name'];
    $mobile_no = $row['mobile_no'];
    $permitted_area = $row['permitted_area'];
    $category = $row['category'];
    $through_gate = $row['through_gate'];
    $in_time = $row['in_time'];
    $out_time = $row['out_time'];   
    $pass_no = $row['pass_no'];
    $status = $row['status'];
   
 }

?>

<style>
    /* Add some basic styling to the form */
    form {
        max-width: 500px;
        margin: 40px auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    label {
        display: block;
        margin-bottom: 10px;
    }

    input[type="text"], input[type="date"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
    }

    input[type="submit"] {
        background-color: #4CAF50;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #3e8e41;
    }
</style>

<form action="controller_update.php" method="post">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <label>Name:</label>
    <input type="text" name="name" value="<?php echo $name; ?>"><br><br>
    <label>Mobile No:</label>
    <input type="text" name="mobile_no" value="<?php echo $mobile_no; ?>"><br><br>
    <label>Permitted Area:</label>
    <input type="text" name="permitted_area" value="<?php echo $permitted_area; ?>"><br><br>
    <label>Category:</label>
    <input type="text" name="category" value="<?php echo $category; ?>"><br><br>
    <label>Through Gate:</label>
    <input type="text" name="through_gate" value="<?php echo $through_gate; ?>"><br><br>
    <label>In Time:</label>
    <input type="datetime" name="in_time" value="<?php echo $in_time; ?>"><br><br>
    <label>Out Time:</label>
    <input type="datetime" name="out_time" value="<?php echo $out_time; ?>"><br><br>
    <label>Pass No:</label>
    <input type="text" name="pass_no" value="<?php echo $pass_no; ?>"><br><br>
    <label>Status:</label>
    <input type="text" name="status" value="<?php echo $status; ?>"><br><br>
    <input type="submit" value="Update">
</form>