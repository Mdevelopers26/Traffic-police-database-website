<html>
<head>
    <title>Add Owner</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<style>
    .buttonHolder{text-align: center;}
</style>
<body>
<main>
    <nav class="navbar navbar-light bg-light">
        <h1 class="mx-auto">Add Owner</h1>
    </nav>
    <form method="post" action="" style="width: 500px; margin:auto" >
        People ID:
        <input type="text" name="People_ID" class="form-control" placeholder="People ID"> <br>
        People name:
        <input type="text" name="People_name" class="form-control" placeholder="People name"> <br>
        Address:
        <input type="text" name="People_address" class="form-control" placeholder="People_address"> <br>
        licence:
        <input type="text" name="People_licence" class="form-control" placeholder="People_licence"> <br>

        <div class="buttonHolder">
        <input id="button" type="submit" value="Add" class="btn btn-primary btn-lg btn-block"> <br>
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

    if (isset($_POST['People_ID'])|| isset($_POST["People_name"])|| isset($_POST["People_address"])|| isset($_POST["People_licence"])) {
        $People_ID = $_POST['People_ID'];
        $People_name = $_POST['People_name'];
        $People_address = $_POST['People_address'];
        $People_licence = $_POST['People_licence'];

        $sql = "INSERT INTO People (People_ID, People_name, People_address, People_licence) Values('{$People_ID}','{$People_name}','{$People_address}','{$People_licence}')";
        mysqli_query($conn, $sql);
    }
    ?>
</main>



</body>
</html>