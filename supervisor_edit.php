<?php
include('connection.php');

$id = $_GET['id'];

$query = "SELECT * FROM data_entry WHERE id =?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

while ($row = mysqli_fetch_assoc($result)) {
    $category = $row['category'];
    $pass_no = $row['pass_no'];
    $name = $row['name'];
    $aadhar_no = $row['aadhar_no'];
    $mobile_no = $row['mobile_no'];
    $dob = $row['dob'];
    $gender = $row['gender'];
    $address = $row['address'];
    $permitted_area = $row['permitted_area'];
    $pass_requested_by = $row['pass_requested_by'];
    $photo = $row['photo'];
    $pass_valid_upto = $row['pass_valid_upto'];
    $status = $row['status'];
    $pass_issued_date_upto = $row['pass_issued_date_upto'];
    $renewed = $row['renewed'];
    $pass_received_by = $row['pass_received_by'];
    $remarks = $row['remarks'];
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

<form action="supervisor_update.php" method="post">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <label>Category:</label>
    <input type="text" name="category" value="<?php echo $category; ?>"><br><br>
    <label>Pass No:</label>
    <input type="text" name="pass_no" value="<?php echo $pass_no; ?>"><br><br>
    <label>Name:</label>
    <input type="text" name="name" value="<?php echo $name; ?>"><br><br>
    <label>Aadhar No:</label>
    <input type="text" name="aadhar_no" value="<?php echo $aadhar_no; ?>"><br><br>
    <label>Mobile No:</label>
    <input type="text" name="mobile_no" value="<?php echo $mobile_no; ?>"><br><br>
    <label>DOB:</label>
    <input type="date" name="dob" value="<?php echo $dob; ?>"><br><br>
    <label>Gender:</label>
    <input type="text" name="gender" value="<?php echo $gender; ?>"><br><br>
    <label>Address:</label>
    <input type="text" name="address" value="<?php echo $address; ?>"><br><br>
    <label>Permitted Area:</label>
    <input type="text" name="permitted_area" value="<?php echo $permitted_area; ?>"><br><br>
    <label>Pass Requested By:</label>
    <input type="text" name="pass_requested_by" value="<?php echo $pass_requested_by; ?>"><br><br>
    <label>Photo:</label>
    <input type="text" name="photo" value="<?php echo $photo; ?>"><br><br>
    <label>Pass Valid Upto:</label>
    <input type="date" name="pass_valid_upto" value="<?php echo $pass_valid_upto; ?>"><br><br>
    <label>Status:</label>
    <input type="text" name="status" value="<?php echo $status; ?>"><br><br>
    <label>Pass Issued Date Upto:</label>
    <input type="date" name="pass_issued_date_upto" value="<?php echo $pass_issued_date_upto; ?>"><br><br>
    <label>Renewed:</label>
    <input type="text" name="renewed" value="<?php echo $renewed; ?>"><br><br>
    <label>Pass Received By:</label>
    <input type="text" name="pass_received_by" value="<?php echo $pass_received_by; ?>"><br><br>
    <label>Remarks:</label>
    <input type="text" name="remarks" value="<?php echo $remarks; ?>"><br><br>
    <input type="submit" value="Update">
</form>