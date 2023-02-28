
<html>
<head>
    <title>Home page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
<style>
    button{
    width: 60%;
    display: block;
    margin: 4px;

    }

    .buttonHolder{text-align: center;}

</style>
<main>
    <div>
    <nav class="navbar navbar-light bg-light">
        <h1 class="mx-auto">Home page</h1>
    </nav>
    </div>


    <div class="buttonHolder">
   <button id="myButton" type="submit" class="btn btn-primary btn-lg">Change Password</button>
    <script type="text/javascript">
        document.getElementById("myButton").onclick = function () {
            location.href = "changepassword.php";
        };
    </script> <br>
    </div>

    <div class="buttonHolder">
    <button id="myButton1" type="submit" class="btn btn-primary btn-lg"  >Search by Name or Licence Number</button> <br>
    <script type="text/javascript">
        document.getElementById("myButton1").onclick = function () {
            location.href = "searchnamelic.php";
        };
    </script>
    </div>

    <div class="buttonHolder">
    <button id="myButton2" type="submit" class="btn btn-primary btn-lg" >Search by Licence number</button> <br>
    <script type="text/javascript">
        document.getElementById("myButton2").onclick = function () {
            location.href = "Vehiclesearch.php";
        };
    </script>

    </div>

    <div class="buttonHolder">
    <button id="myButton3" type="submit" class="btn btn-primary btn-lg" >Add Owner</button>
    <script type="text/javascript">
        document.getElementById("myButton3").onclick = function () {
            location.href = "add_owner.php";
        };
    </script> <br>
    </div>

    <div class="buttonHolder">
    <button id="myButton4" type="submit" class="btn btn-primary btn-lg" >Add Vehicle</button>
    <script type="text/javascript">
        document.getElementById("myButton4").onclick = function () {
            location.href = "new_vehicle.php";
        };
    </script> <br>
    </div>

    <div class="buttonHolder">
        <button id="myButton10" type="submit" class="btn btn-danger btn-sm " >Log Out</button>
        <script type="text/javascript">
            document.getElementById("myButton10").onclick = function () {
                location.href = "login.php";
            };
        </script> <br>
    </div>





<!--    <p>click <a href="changepassword.php">Change Password</a>.</p>-->
<!--    <p>click <a href="searchnamelic.php">Search by Name or License Number</a>.</p>-->
<!--    <p>click <a href="Vehiclesearch.php">Search by license plate</a>.</p>-->
<!--    <p>click <a href="login.php">Log out</a>.</p>-->


    <?php
        error_reporting(E_ALL);
        ini_set('display_errors',1);
        $servername = "mysql.cs.nott.ac.uk";
        $username = "psxms21_cw2";
        $password = "intro123";
        $dbname = "psxms21_cw2";

    if (isset($_POST['name'])) {
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die ("Connection failed");

        }
    }
    ?>
</main>
</body>
</html>