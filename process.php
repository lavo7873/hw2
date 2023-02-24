<html>
  <head>
    <link rel="stylesheet" href="style.css">
    <title>Processing File</title>
  </head>

  <body>
    <h1 style ="color: white; margin-top: 200px; text-align: center; font-size: 300%; margin-bottom: 60px";><b> Processing </b></h1>

    <?php
    if (isset($_POST["username"]) && isset($_POST["password"])) {
      if($_POST["username"] && $_POST["password"]) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Create connection
          $conn = mysqli_connect('localhost', 'root', "", 'users');

        // Check connection
          if (!$conn) {
           die("Connection failed: " . mysqli_connect_error());
          }
        // Register user
          $sql = "INSERT INTO students (username, password) VALUES ('$username', '$password')";

          $results = mysqli_query($conn, $sql);

          if ($results) {
           echo '<i style="color:white;font-size:20px; margin-left: 540px;">
                The user has been added in data. Thank you!</i>';

          } else {
           echo mysqli_error($conn);
          }

          mysqli_close($conn); // close connection
      } else {
         echo  '<i style="color:white;font-size:20px; margin:487px; ">
              Username or password is empty. Please enter again!</i>';
      }
      } else {
        echo '<i style="color:white;font-size:20px; margin:550px; ">Form was not submitted.</i>';
      }

    ?>


  </body>

</html>
