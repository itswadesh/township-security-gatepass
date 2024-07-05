<?php
include('connection.php');

// Fetch data
if (isset($_POST['pass_no'])) {
  $passNo = $_POST['pass_no'];
  $query = "SELECT * FROM data_entry WHERE pass_no = ?";
  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, 's', $passNo);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  if (mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_assoc($result);
    echo json_encode($data); // Return JSON data to JavaScript for populating form fields
  } else {
    echo "Pass not found";
  }
}

// Save data
if (isset($_POST['name'], $_POST['mobile_no'], $_POST['permitted_area'], $_POST['category'], $_POST['through_gate'], $_POST['in_time'], $_POST['out_time'], $_POST['photo'], $_POST['pass_no'])) {
  $name = $_POST['name'];
  $mobileNo = $_POST['mobile_no'];
  $permittedArea = $_POST['permitted_area'];
  $category = $_POST['category'];
  $throughGate = $_POST['through_gate'];
  $inTime = $_POST['in_time'];
  $outTime = $_POST['out_time'];
  $photo = $_POST['photo'];
  $passNo = $_POST['pass_no'];

  // Get the image file name from the URL
  $imageFileName = basename($photo);

  // Download the image using curl (assuming $photo is a URL to the image)
  $imagePath = "uploads1/" . $imageFileName;
  $fp = fopen($imagePath, 'wb');
  $ch = curl_init($photo);
  curl_setopt($ch, CURLOPT_FILE, $fp);
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_exec($ch);
  curl_close($ch);
  fclose($fp);

  // Save the data to the movement table
  $status = "Pending"; // Default status, modify as needed
  $query = "INSERT INTO movement (name, mobile_no, permitted_area, category, through_gate, in_time, out_time, image_path, pass_no, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, 'ssssssssss', $name, $mobileNo, $permittedArea, $category, $throughGate, $inTime, $outTime, $imageFileName, $passNo, $status);
  
  if (mysqli_stmt_execute($stmt)) {
    // Optionally, you can redirect or refresh the page after successful save
    echo "Data saved successfully"; // This message should be handled in JavaScript
  } else {
    error_log("Error saving data: " . mysqli_error($conn));
    echo "Error saving data";
  }
}

mysqli_close($conn);
?>
