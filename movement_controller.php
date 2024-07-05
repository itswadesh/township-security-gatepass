<?php
include('connection.php');

// Check if all required parameters are present
if (isset($_POST['pass_no'], $_POST['name'], $_POST['mobile_no'], $_POST['permitted_area'], $_POST['category'], $_POST['in_time'], $_POST['out_time'], $_POST['through_gate'], $_POST['status'])) {
    $passNo = $_POST['pass_no'];
    $name = $_POST['name'];
    $mobileNo = $_POST['mobile_no'];
    $permittedArea = $_POST['permitted_area'];
    $category = $_POST['category'];
    $inTime = $_POST['in_time'];
    $outTime = $_POST['out_time'];
    $throughGate = $_POST['through_gate'];
    $status = $_POST['status'];

    // Insert into movement table
    $query = "INSERT INTO movement (pass_no, name, mobile_no, permitted_area, category, in_time, out_time, through_gate, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'sssssssss', $passNo, $name, $mobileNo, $permittedArea, $category, $inTime, $outTime, $throughGate, $status);
    
    if (mysqli_stmt_execute($stmt)) {
        echo "Movement data saved successfully";
    } else {
        error_log("Error saving movement data: " . mysqli_error($conn));
        echo "Error saving movement data";
    }

    mysqli_stmt_close($stmt);
} else {
    echo "Missing required parameters";
}

mysqli_close($conn);
?>
