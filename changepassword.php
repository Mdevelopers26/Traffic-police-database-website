

<html>
<head>
    <title>Change Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<style>
    .buttonHolder{text-align: center;}
</style>
<body>
<main>
    <nav class="navbar navbar-light bg-light">
        <h1 class="mx-auto">Change Password</h1>
    </nav>
    <form method="post" style="width: 500px; margin:auto">

        Username:
        <input type="password" name="name" class="form-control" placeholder="Username" required> <br>
        Current Password:
        <input type="password" name="currentPassword" placeholder="Current Password" class="form-control" required> <br>
        New Password:
        <input type="password" name="newPassword" placeholder="New Password" class="form-control" required> <br>
        Confirm Password:
        <input type="password" name="confirmPassword" placeholder="Confirm Password" class="form-control" required> <br>
        <div class="buttonHolder">
        <input id="button" type="submit" value="Change" class="btn btn-primary btn-lg btn-block"> <br
        </div>
    </form>

    <div class="buttonHolder">
        <button id="myButton8" type="submit" class="btn btn-secondary btn-lg"  >Return to Home page</button> <br>
        <script type="text/javascript">
            document.getElementById("myButton8").onclick = function () {
                location.href = "main.php";
            };
        </script>
    </div>

    <?php
        error_reporting(E_ALL);
        ini_set('display_errors',1);
        $servername = "mysql.cs.nott.ac.uk";
        $username = "psxms21_cw2";
        $password = "intro123";
        $dbname = "psxms21_cw2";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if(!$conn) {
            die ("Connection failed");
        }
    if(isset($_POST["name"])|| isset($_POST["currentPassword"])|| isset($_POST["newPassword"]) || isset($_POST["confirmPassword"])) {
        $user_name = $_POST["name"];
        $currentPassword = $_POST['currentPassword'];
        $newPassword = $_POST['newPassword'];
        $confirmPassword = $_POST['confirmPassword'];
        $sql = "SELECT * FROM Users WHERE Username='$user_name'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        $update = "UPDATE Users set Password='$newPassword' WHERE Username='$user_name' ";


        if ($_POST["currentPassword"] == $row["Password"] && $_POST["newPassword"] == $_POST["confirmPassword"]) {
            mysqli_query($conn, $update);
            echo "Password Changed Succesfully";
        } else {
            echo "Password is not correct";
        }

    }
    ?>


</main>
<footer><a href="index.php">Back to main page</a></footer>
</body>
</html>