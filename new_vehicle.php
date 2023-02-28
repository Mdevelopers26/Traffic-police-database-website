<html>
<head>
    <title>Add Vehicle</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<style>
    .buttonHolder{text-align: center;}
</style>
<body>
<main>
    <nav class="navbar navbar-light bg-light">
        <h1 class="mx-auto">Add a New Vehicle</h1>
    </nav>
    <form method="post" action="" style="width: 500px; margin:auto">
        Vehicle ID:
        <input type="text" name="Vehicle_ID" class="form-control" placeholder="Vehicle ID"> <br>
        Vehicle type:
        <input type="text" name="Vehicle_type" class="form-control" placeholder="Vehicle type"> <br>
        Vehicle colour:
        <input type="text" name="Vehicle_colour" class="form-control" placeholder="Vehicle colour"> <br>
        Vehicle licence:
        <input type="text" name="Vehicle_licence" class="form-control" placeholder="Vehicle licence"> <br>
        Owner ID:
        <input type="text" name="Owner_ID" class="form-control" placeholder="Owner ID"> <br>
        <input id="button" type="submit" value="Change" class="btn btn-primary btn-lg btn-block"> <br>
    </form>

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

    if (isset($_POST['vehicle_color'])) {
        $Vehicle_ID = $_POST['Vehicle_ID'];
        $Vehicle_type = $_POST['Vehicle_type'];
        $Vehicle_colour = $_POST['Vehicle_colour'];
        $Vehicle_licence = $_POST['Vehicle_licence'];
        $People_ID = $_POST['Owner_ID'];


    $sql = "INSERT INTO Vehicle (Vehicle_ID, Vehicle_type, Vehicle_colour, Vehicle_licence) Values('{$Vehicle_ID}','{$Vehicle_type}','{$Vehicle_colour}','{$Vehicle_licence}')";
    mysqli_query($conn, $sql);

    $sql1 = "INSERT INTO Ownership (People_ID, Vehicle_ID) Values('{$Vehicle_ID}','{$People_ID}')";
    mysqli_query($conn, $sql1);


    
    }
    ?>
</main>
<div class="buttonHolder">
    <button id="myButton8" type="submit" class="btn btn-secondary btn-lg"  >Return to Home page</button> <br>
    <script type="text/javascript">
        document.getElementById("myButton8").onclick = function () {
            location.href = "main.php";
        };
    </script>
</div>
</body>
</html>