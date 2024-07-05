<?php
include('connection.php');

// Check if the database connection is successful
if (!$conn) {
    die("Connection failed: ". mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process the form data
    $category = $_POST['category'];
    $pass_no = $_POST['pass_no'];
    $name = $_POST['name'];
    $aadhar_no = $_POST['aadhar_no'];
    $mobile_no = $_POST['mobile_no'];
    $dob = date("Y-m-d", strtotime($_POST['dob']));
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $permitted_area = $_POST['permitted_area'];
    $pass_requested_by = $_POST['pass_requested_by'];
    $pass_valid_upto = date("Y-m-d", strtotime($_POST['pass_valid_upto']));
    $status = $_POST['status'];
    $pass_issued_date_upto = date("Y-m-d", strtotime($_POST['pass_issued_date_upto']));
    $renewed = $_POST['renewed'];
    $pass_received_by = $_POST['pass_received_by'];
    $remarks = $_POST['remarks'];
    $barcode = $_POST['barcode'];

    // Upload file
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["photo"]["name"]);

    // Check if the upload was successful
    if (!move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
        echo "Error uploading file: " . $_FILES["photo"]["error"];
        exit;
    }

    // Check if the form is submitted for saving or updating
    if (isset($_POST['action']) && $_POST['action'] == 'save') {
        // Attempt to execute the prepared statement for saving
        $sql = "INSERT INTO data_entry (category, pass_no, name, aadhar_no, mobile_no, dob, gender, address, permitted_area, pass_requested_by, photo, pass_valid_upto, status, pass_issued_date_upto, renewed, pass_received_by, remarks, barcode) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssssssssssssss", 
            $category, 
            $pass_no, 
            $name, 
            $aadhar_no, 
            $mobile_no, 
            $dob, 
            $gender, 
            $address, 
            $permitted_area, 
            $pass_requested_by, 
            $target_file, 
            $pass_valid_upto, 
            $status, 
            $pass_issued_date_upto, 
            $renewed, 
            $pass_received_by, 
            $remarks, 
            $barcode);
        $stmt->execute();

        // Check if the insertion is successful
        if ($stmt->affected_rows > 0) {
            header("Location: submit_form.html");
            echo "<script>alert('Data uploaded successfully!');</script>";
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Check for errors 
        if ($stmt->error) {
            echo "Error: " . $stmt->error;
        }

        // Close statement and connection
        $stmt->close();
        $conn->close();
    } elseif (isset($_POST['action']) && $_POST['action'] == 'update') {
        // Redirect to supervisor_db.php
        header("Location: supervisor_db.php");
        exit;
    }
}
?>