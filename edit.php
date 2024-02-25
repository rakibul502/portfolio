<?php
include 'datacun.php';
$id = $_GET["IDNO"];
// 11
$query = "SELECT * FROM subb WHERE id=$id";
$result = mysqli_query($connect, $query);
$row = mysqli_fetch_array($result);
//11 
if (isset($_POST["EDIT"])) {
    $nname = $_POST["Name"];
    $u_email = $_POST["Email"];
    $u_number = $_POST["Number"];
    $option = $_POST["Option"];

    $name= $_FILES["file"]["name"];
    $tempname = $_FILES["file"]["tmp_name"];
    $upload = move_uploaded_file($tempname,'upload/'.$name);

    // $img = $_FILES["st_img"]["name"];
    // $tmp_name = $_FILES["st_img"]["tmp_name"];
    // $upload = move_uploaded_file($tmp_name, 'upload/' . $img);

if ($upload == true){
    $update = "UPDATE subb SET Name='$nname',Email='$u_email',Eumber='$u_number',eption='$option',img='$name' where id='$id'";
    $runQuery = mysqli_query($connect, $update);
    if ($runQuery) {
         header("location:tb.php");
        echo"a";
    } else {
        echo"b";
    }
} else {
    echo"not";
}

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'link1.php'; ?>

    <style>
        .a {
            background: linear-gradient(150deg, #fdcd3b 60%, #ffed4b 60%);
            margin-top: 10px;
            box-shadow: 10px 20px 30px 4px;
            border-radius: 1110px 900px 1110px 100px;
            border-style: dotted;
        }

        .b {
            width: 500px;
            margin: auto;
            padding: 20px 10px;

        }

        .d {
            text-align: center;
            color: aqua;
            background-color: rgb(10, 15, 15);
            box-shadow: 10px 20px 30px 4px;
            border-radius: 10px 900px 10px 1100px;
            border-style: dotted;
        }
    </style>

    <!-- <link rel="stylesheet" href="top.css"> -->

</head>

<body>
    <h1 class="d container">EDIT DATA </h1>
    <div class="container a ">
        <form method="POST" class="text-danger b"  enctype="multipart/form-data">
            <!-- Name input -->
            <div class="form-outline mb-4">
                <input value="<?php echo $row["Name"]; ?>" name="Name" type="text" id="form5Example1"
                    class="form-control" />
                <label class="form-label">Name</label>
            </div>

            <!-- Email input -->
            <div class="form-outline mb-4">
                <input value="<?php echo $row["Email"]; ?>" name="Number" type="Number" id="form5Example2"
                    class="form-control" />
                <label class="form-label">Email address</label>
            </div>
            <!-- number  -->
            <div class="form-outline mb-4">
                <input value="<?php echo $row["Eumber"]; ?>" name="Email" type="Email" id="form5Example2"
                    class="form-control" />
                <label class="form-label">number</label>
            </div>
            <!-- Open this select menu -->
            <div class="form-outline mb-4">
                <select value="Option" name="Option" class="form-select" aria-label="Default select example">
                    <option>One</option>
                    <option>Two</option>
                    <option>Three</option>
                    <option>fore</option>
                    <option>five</option>
                </select>
            </div>
            <div class="form-outline mb-4">
                <input value="<?php echo $row['img']; ?>" type="file" name="file">
            </div>
            <!-- Submit button -->
            <button type="submit" name="EDIT" class="btn btn-primary btn-block mb-4">EDIT</button>
        </form>
    </div>
    <!--  -->
    <br><br><br>
    
    <table class="table table-striped table-hover table-bordered container">

        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Number</th>
        <th>Option</th>
        <th>img</th>
        <?php 
    $query = "SELECT * FROM subb";
    $result = mysqli_query($connect, $query);
    $i=1;
        while($row = mysqli_fetch_array($result)){ ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td> <?php echo $row['Name']  ?> </td>
            <td> <?php echo $row['Email']  ?> </td>
            <td> <?php echo $row['Eumber']  ?> </td>
            <td> <?php echo $row['eption']  ?> </td>
            <td><img style="width: 50px; height: 50px;" src="upload/<?php echo $row["img"]; ?>"></td>

        </tr>
        <?php  $i++;}?>
    </table>


</body>

</html>