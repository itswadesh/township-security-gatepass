<?php
include('connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $category = $_POST['category'];
    $pass_no = $_POST['pass_no'];
    $name = $_POST['name'];
    $aadhar_no = $_POST['aadhar_no'];
    $mobile_no = $_POST['mobile_no'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $permitted_area = $_POST['permitted_area'];
    $pass_requested_by = $_POST['pass_requested_by'];
    $photo = $_POST['photo'];
    $pass_valid_upto = $_POST['pass_valid_upto'];
    $status = $_POST['status'];
    $pass_issued_date_upto = $_POST['pass_issued_date_upto'];
    $renewed = $_POST['renewed'];
    $pass_received_by = $_POST['pass_received_by'];
    $remarks = $_POST['remarks'];

    // Validate input data
    if (empty($category) || empty($pass_no) || empty($name) || empty($aadhar_no) || empty($mobile_no) || empty($dob) || empty($gender) || empty($address) || empty($permitted_area) || empty($pass_requested_by) || empty($photo) || empty($pass_valid_upto) || empty($status) || empty($pass_issued_date_upto) || empty($renewed) || empty($pass_received_by) || empty($remarks)) {
        echo "Invalid data";
        exit;
    }

    $query = "UPDATE data_entry SET category =?, pass_no =?, name =?, aadhar_no =?, mobile_no =?, dob =?, gender =?, address =?, permitted_area =?, pass_requested_by =?, photo =?, pass_valid_upto =?, status =?, pass_issued_date_upto =?, renewed =?, pass_received_by =?, remarks =? WHERE id =?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'sssssssssssssssssi', 
    $category, $pass_no, $name, $aadhar_no, $mobile_no, $dob, $gender, 
    $address, $permitted_area, $pass_requested_by, $photo, $pass_valid_upto, 
    $status, $pass_issued_date_upto, $renewed, $pass_received_by, $remarks, $id);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        mysqli_stmt_close($stmt);
        header("Location: supervisor_db.php?updated=true");
        exit;
    } else {
        mysqli_stmt_close($stmt);
        echo "Error updating user";
    }
} else {
    echo "Invalid request";
}
?>