<?php
// Connect to the database
$host = "localhost";
$user = "root";
$password = "";
$database = "multilogin";

$db = new mysqli($host, $user, $password, $database);
if ($db->connect_error) {
  die("Connection failed: " . $db->connect_error);
}

// Handle GET request to retrieve doctors data
if ($_SERVER["REQUEST_METHOD"] == "GET") {
  $search = isset($_GET["search"]) ? $_GET["search"] : "";

  $query = "SELECT * FROM volunteers";
  if ($search) {
    $query .= " WHERE id LIKE '%$search%' OR name LIKE '%$search%' OR address LIKE '%$search%' OR description LIKE '%$search%'";
  }
  $result = $db->query($query);

  if ($result) {
    $machines = array();
    while ($row = $result->fetch_assoc()) {
      array_push($machines, $row);
    }
    echo json_encode($machines);
  } else {
    http_response_code(500);
    echo "Failed to retrieve volunteers data";
  }
}

// Handle POST request to add a new machine
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $volunteerName = isset($_POST["volunteerName"]) ? $_POST["volunteerName"] : "";
  $volunteers_number = isset($_POST["volunteer_number"]) ? $_POST["volunteer_number"] : "";
  $address = isset($_POST["address"]) ? $_POST["address"] : "";
  $description = isset($_POST["description"]) ? $_POST["description"] : "";

  $query = "INSERT INTO volunteers (name, number, address) VALUES 
  ('$volunteerName', '$volunteer_number', '$address')";
  $result = $db->query($query);

  if ($result) {
    echo "New help added successfully";
  } else {
    http_response_code(500);
    echo "Failed to add new help";
  }
}

// Handle PUT request to update an existing machine
if ($_SERVER["REQUEST_METHOD"] == "PUT") {
  parse_str(file_get_contents("php://input"), $data);
  $id = isset($data["id"]) ? $data["id"] : "";
  $volunteerName = isset($data["name"]) ? $data["name"] : "";
  $volunteer_number = isset($data["number"]) ? $data["number"] : "";
  $address = isset($data["address"]) ? $data["address"] : "";

  $query = "UPDATE volunteers SET name='$name',  number='$number', address='$address' WHERE id='$id'";
  $result = $db->query($query);

  if ($result) {
    echo "Machine updated successfully";
  } else {
    http_response_code(500);
    echo "Failed to update machine";
  }
}

// Handle DELETE request to delete an existing machine
if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
  $id = isset($_GET["id"]) ? $_GET["id"] : "";

  $query = "DELETE FROM machines WHERE id='$id'";
  $result = $db->query($query);

  if ($result) {
    echo "Machine deleted successfully";
  } else {
    http_response_code(500);
    echo "Failed to delete machine";
  }
}

// Close database connection
$db->close();
?>
