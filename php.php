<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "students";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (isset($_POST['submit'])) {
    $var_dump = ($_POST['email']);
    $var_dump1 = ($_POST['pass']);
    //img
    $filename = $_FILES["uploadimg"]["name"];
    $tempname = $_FILES["uploadimg"]["tmp_name"];
    $upload = move_uploaded_file($tempname, 'up/' . $filename);

    //Duplicate email
    $Duplicate_email = "SELECT * FROM st_table WHERE pass='$var_dump1'";
    $exc = mysqli_query($conn, $Duplicate_email);
    $count = mysqli_num_rows($exc);

    if ($count > 0) {
        echo "email already exist";
    } else {
        //INSERT
        $query = "INSERT INTO st_table (email, pass,img) VALUES ('$var_dump', '$var_dump1','$filename')";
        $result = mysqli_query($conn, $query);
        if ($result) {
            header("Location: php.php");

        } else {
            echo "Error: ";
        }
        //INSERT end
    }



}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="cs.css">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<style>
body {
    padding: 25px;
    background-color: white;
    color: black;
    font-size: 15px;
    text-color: white;
}

.dark-mode {
    background-color: black;
    color: white;
}
</style>

<body>
    <!-- loging form -->




    <form action="" method="post" enctype="multipart/form-data">
        <div>
            <label for="number">number</label>
            <input type="number" id="email" name="email" />
            <label for="email">Email:</label>
            <input type="email" name="pass" />
            <div class="form-group">
                <input class="form-control" type="file" name="uploadimg" value="" />
            </div>
        </div>

        <button type="submit" name="submit">Submit</button>
    </form>
    <!--  -->
    <div class="container">
        <!-- <h2>Basic Table</h2> -->
        <table class="table">
            <!-- <thead>
                <tr>
                    <th>Sl No</td>
                    <th>Email</th>
                    <th>Pass</th>
                    <th>Img</th>
                    <th>Edit</th>
                    <th>Delate</th>
                   <th>Show</th>
                </tr>
            </thead> -->
            <!--  -->
            <?php
            $i = 0;
            $query = "SELECT * FROM st_table";
            $retval = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array ($retval)) { ?>
            <tbody>
                <tr class="">
                    <td>
                        <?php echo $row["id"]; ?>
                    </td>
                    <td>
                        <?php echo $row["email"]; ?>
                    </td>

                    <td>
                        <?php echo $row["pass"]; ?>
                    </td>
                    <td>
                        <img width="100px" height="100px" src="./up/<?php echo $row['img']; ?>">
                    </td>
                    <td><a onClick="return confirm('are you sure EDIT?')"
                            href="edit.php?idno=<?php echo $row["id"]; ?>"><button type="button"
                                class="btn-success">EDIT</button></a></td>
                    <td><a onClick="return confirm('are you sure Delete?')"
                            href="delet.php?idn=<?php echo $row["id"]; ?>"><button
                                class="btn-danger">DELETE</button></a></td>

                    <td><a href="show.php?idno=<?php echo $row["id"]; ?>"><button class="btn-primary">SHOW</button></a>
                    </td>
                </tr>

                <?php
                    $i++;
            }

            ?>
                <!--  -->


            </tbody>
        </table>
    </div>

    <script src="js.js"></script>

</body>

</html>