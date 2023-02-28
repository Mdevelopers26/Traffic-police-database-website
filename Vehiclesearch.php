<html>
<head>
    <title>Search Vehicle Licence</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<style>
    .buttonHolder{text-align: center;}
    table, th, td {
        border-collapse: collapse;
        border: 1px solid black;
    }
</style>
<body>
<main>
    <nav class="navbar navbar-light bg-light">
        <h1 class="mx-auto">Search via Vehicle licence plate</h1>
    </nav>


    <form method="post" style="500px; margin:auto">

        License plate:
        <input type="text" name="License" class="form-control" placeholder="License_Number"> <br>
        <input id="button" type="submit" value="Search" class="btn btn-primary btn-lg btn-block"> <br>

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
    if(isset($_POST['License'])) {
        $license = $_POST['License'];
        $sql1 = "SELECT People.People_name, People.People_licence, Vehicle.Vehicle_licence, 
            Vehicle.Vehicle_colour, Vehicle.Vehicle_type FROM 
            ((Ownership LEFT JOIN People ON Ownership.People_ID = People.People_ID) 
            LEFT JOIN Vehicle ON Ownership.Vehicle_ID = Vehicle.Vehicle_ID) WHERE Vehicle.Vehicle_licence ='$license';";
        $result = mysqli_query($conn, $sql1);

        if (!$conn) {
            die ("Connection failed");
        }

        echo '<table class="table table-striped">
        <caption style="font-size: 120%">Search Results</caption>
        <tr class="table-primary">
            <th>Name</th>
            <th>People Licence</th>
            <th>Vehicle licence</th>
            <th>Vehicle colour</th>
            <th>Vehicle type</th>
            
        </tr>';


        if (empty($license)) {
            echo '<br/>';
        } elseif (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '
            <tr >
                <td>' . $row['People_name'] . '</td>
                <td>' . $row['Vehicle_licence'] . '</td>
                <td>' . $row['People_licence'] . '</td>
                <td>' . $row['Vehicle_colour'] . '</td>
                <td>' . $row['Vehicle_type'] . '</td>
            </tr>';


            }

            echo '</table>';
        } else {
            echo "Invalid entry ";
        }


        mysqli_close($conn);


    }



    ?>
</main>
</body>
</html>