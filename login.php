<html>
    <header>
      <link rel="stylesheet" href="style.css">
      <title>Sign In</title>
    </header>
    <body>
      <h1><b> Sign In</b></h1>

      <div class="container">
          <div class="row">
            <form action="login.php" method="post">
              <div class="form-group">
                <input style="height:30px; width:200px;" type="text" placeholder="Username" name="username" class="form-control" >
              </div>
              <br>
              <div class="form-group">
                <input style="height:30px; width:200px;" type="password" placeholder = "Password" name="password" class="form-control" >
              </div>
                <button style="font-size:150% "; type="Submit" class="btn btn"> Login</button>
            </form>
          </div>
        </div>
        <?php
           $logged_in = false;

           if (isset($_POST["username"]) && isset($_POST["password"])) {
             if ($_POST["username"] && $_POST["password"]) {
               $username = $_POST["username"];
               $password = $_POST["password"];

               // Create connection
               $conn = mysqli_connect("localhost", "root", "", "users");

               // Check connection
                 if (!$conn) {
                 die("Connection failed: " . mysqli_connect_error());
               }
               // Select user
                 $sql = "SELECT password FROM students WHERE username = '$username'";

                 $results = mysqli_query($conn, $sql);

                 if ($results) {

                   $row = mysqli_fetch_assoc($results);
                   if ($row["password"] === $password) {
                     $logged_in = true;
                     echo '<i style="color:#a8d9f0; font-size:30px;  ">Success! Here are accounts that have been created.</i>';
                     $sql = "SELECT * FROM students";
                     $results = mysqli_query($conn, $sql);
                   } else {
                     echo '<i style="color:#a8d9f0; font-size:30px;  ">Failed</i>';
                   }

                 } else {
                   echo mysqli_error($conn);
                 }
                 mysqli_close($conn); // close connection
               } else {
                 echo '<i style="color:#a8d9f0;  font-size:30px;  ">Nothing was submitted</i>';
               }
             }
        ?>
      <br>
      <br>
      <table>
        <thead>
          <tr>
            <th>username</th>
            <th>password</th>
          </tr>
        </thead>
        <tbody>
          <?php

            if ($logged_in && $results) {
              while ($row = mysqli_fetch_assoc($results)) {
                echo "<tr>";
                echo "<td>" . $row["username"] . "</td>";
                echo "<td>" . $row["password"] . "</td>";
                echo "</tr>";
              }
            }
           ?>
         </tbody>
        </table>
      </body>
</html>
