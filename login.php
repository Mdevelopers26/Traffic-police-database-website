<html>
<head>
		<title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	</head>

<body>
<main>
<nav class="navbar navbar-light bg-light">
  <h1 class="mx-auto">Login page</h1>
</nav>
    <form method="post" style="width: 500px; margin:auto">
      <div class="form-group">
        Username:<input type="text" name ="name" class="form-control" placeholder= "Username"  class="form-control is-invalid"  required>
      </div>

      <!--        Username: <input type="text" name="name" required><br/>-->
        Password: <input type="password" name="password" class="form-control" placeholder= "Password" required><br/>
        <button id="button" type="submit" class="btn btn-primary btn-lg">Login</button>
  </form>

<?php
       error_reporting(E_ALL);
       ini_set('display_errors',1);
       $servername = "mysql.cs.nott.ac.uk";
       $username = "psxms21_cw2";
       $password = "intro123";
       $dbname = "psxms21_cw2";


if (isset($_POST['name']))
{
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if(!$conn) {
        die ("Connection failed");
    }
    $user_name = $_POST['name'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM Users WHERE Username='$user_name'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
            $confirm_password = $row['Password'];
            if ($password == $confirm_password){
                echo "login successful";
                header("Location:main.php");
            }
            else{
                echo " your password is wrong";
            }

    }
    else {

        echo "This user doesn't exist";
    }

    mysqli_close($conn);
}

  ?>
</main>

</body>
</html>
