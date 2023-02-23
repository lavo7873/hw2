<?php


$logged_in = false;
if (isset($_POST["username"]) && isset($_POST["password"])) {
if ($_POST["username"] && $_POST["password"]) {

$username = $_POST["username"];
$password = $_POST["password"];

// create connection
$conn = mysqli_connect("localhost", "root", "", "users"); // check connection



if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT password FROM students WHERE username = '$username'";
$results = mysqli_query($conn, $sql);

if ($results) {
$row = mysqli_fetch_assoc($results);

if ($row["password"] === $password) {
$logged_in = true;
// $sql = "SELECT * FROM students";
// $results = mysqli_query($conn, $sql);
date_default_timezone_set('America/Los_Angeles');
$login_time = date("Y-m-d H:i:s");
	$sql = "UPDATE students SET lastlogin_time='$login_time' WHERE username= '$username'";
	$results = mysqli_query($conn, $sql);
} else {
  echo '<script>alert("incorrect password")</script>';
}


} else {
echo mysqli_error($conn);
 }
mysqli_close($conn); // close connection

} else {
echo "Nothing was submitted.";
}

}

?>

</div>
<?php
if ($logged_in && $results) {
  echo '<script>alert("sign in successfully.")</script>';
}
?>
