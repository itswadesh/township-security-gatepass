<?php
include('connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $mobile_no = $_POST['mobile_no'];
    $permitted_area = $_POST['permitted_area'];
    $category =$_POST['category'];
    $through_gate = $_POST['through_gate'];
    $in_time = $_POST['in_time'];
    $out_time = $_POST['out_time'];   
    $pass_no = $_POST['pass_no'];
    $status = $_POST['status'];
    // Validate input data
    if (empty($name) || empty($mobile_no) || empty($permitted_area) || empty($category) || empty($through_gate) || empty($in_time) || empty($out_time) || empty($pass_no) || empty($status)) {
        echo "Invalid data";
        exit;
    }

    $query = "UPDATE movement SET name =?, mobile_no =?, permitted_area =?, category =?, through_gate =?, in_time =?, out_time =?, pass_no =?, status =? WHERE id =?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'sssssssssi', 
    $name, $mobile_no, $permitted_area, $category, $through_gate, $in_time, $out_time, $pass_no, 
    $status, $id);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        mysqli_stmt_close($stmt);
        header("Location: controller_db.php?updated=true");
        exit;
    } else {
        mysqli_stmt_close($stmt);
        echo "Error updating user";
    }
} else {
    echo "Invalid request";
}
?>