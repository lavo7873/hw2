<html>
<head>
	<title>Process</title>
</head>
<body>
	<h1>Process Data</h1>
	<?php
	if (isset($_POST["username"]) && isset($_POST["password"])) {
		if (($_POST["username"]) && ($_POST["password"])){

		$username = $_POST["username"];
		$password = $_POST["password"];
		date_default_timezone_set('America/Los_Angeles');
		$create_time = date("Y-m-d H:i:s");
		$login_time = date("Y-m-d H:i:s");


			// create connection
			$conn = mysqli_connect("localhost", "root", "", "users");
			// check connection
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error()); }
				// register user
				$sql = "INSERT INTO students (username, password, create_time, lastlogin_time) VALUES ('$username', '$password', '$create_time', '$login_time')";
				$results = mysqli_query($conn, $sql);
				if ($results) {
					echo "The user has been added.";
					 echo  "<a href= 'login.html'> Go to Login page.</a>";
				} else {
					echo mysqli_error($conn);
				echo "The username is already existed.  ";
	      echo  "<a href= 'registration.html'> Return to registration</a>";

				}
				mysqli_close($conn); // close connection
			} else {
				echo "username or password is empty.";
				echo  "<a href= 'registration.html'> Return to registration</a>";
			}

		} else {
			echo "Form was not submitted.";
		}
		?>
	</body>
	</html> -->
