<html>
<head>
    <title>Vehicle Search</title>
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
        <h1 class="mx-auto">Search with name and License</h1>
    </nav>

    <form method="post" style="width: 500px; margin:auto">
        Name:
        <input type="text" name="name" class="form-control" placeholder="Name"> <br>
        License Number:
        <input type="text" name="License" class="form-control" placeholder="Username"> <br>

        <div class="buttonHolder">
        <input id="button" type="submit" value="Search" class="btn btn-primary btn-lg btn-block"> <br>
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
        ini_set('display_errors', 1);
        $servername = "mysql.cs.nott.ac.uk";
        $username = "psxms21_cw2";
        $password = "intro123";
        $dbname = "psxms21_cw2";
        $conn = mysqli_connect($servername, $username, $password, $dbname);



    if(isset($_POST["name"])|| isset($_POST["License"])) {
        $person_name = $_POST['name'];
        $license = $_POST['License'];
        $sql1 = "SELECT * FROM People WHERE upper (People_name) LIKE upper ('%$person_name%')";
        $sql2 = "SELECT * FROM People where upper (People_licence) LIKE upper ('$license')";
        $result_name = mysqli_query($conn, $sql1);
        $result_license = mysqli_query($conn, $sql2);


            if (!$conn) {
                die ("Connection failed");
            }

            echo '<table class="table table-striped">
                <caption style="font-size: 120%">Search Results</caption>
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Driving license number</th>
                </tr>';


            if (empty($person_name)) {
                echo '<br/>';
            } elseif (mysqli_num_rows($result_name) > 0) {
                while ($row = mysqli_fetch_assoc($result_name)) {
                    echo '
                    <tr>
                        <td>' . $row['People_name'] . '</td>
                        <td>' . $row['People_address'] . '</td>
                        <td>' . $row['People_licence'] . '</td>
                    </tr>';
                }

                echo '</table>';
            } else {
                echo "Person Doesn't exist in system";
            }

            if (empty($license)) {
                echo '<br/>';
            } elseif (mysqli_num_rows($result_license) > 0) {
                while ($row = mysqli_fetch_assoc($result_license)) {
                    echo '
                    <tr>
                        <td>' . $row['People_name'] . '</td>
                        <td>' . $row['People_address'] . '</td>
                        <td>' . $row['People_licence'] . '</td>
                    </trtable-secondary>';
                }

                echo '</table>';
            } else {
                echo "Person Doesn't exist in system";
            }
            mysqli_close($conn);


    }



   ?>
</main>
</body>
</html>

