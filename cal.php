<?php
$mess="";
include 'datacun.php';
if (isset($_POST["Submit2"])) {
    $total_subject=0;
    $Bangla = 0;
    $English = 0;
    $Math = 0;
    $Ict = 0;
    $Name = $_POST["Name"];
    $Roall = $_POST["Roall"];

    if ($_POST["Bangla"]) {
        $Bangla = $_POST["Bangla"];
        $total_subject = $total_subject + 1;
    }
    if ($_POST["English"]) {
        $English = $_POST["English"];
        $total_subject = $total_subject + 1;
    }
    if ($_POST["Math"]) {
        $Math = $_POST["Math"];
        $total_subject = $total_subject + 1;
    }
    if ($_POST["Ict"]) {
        $Ict = $_POST["Ict"];
        $total_subject = $total_subject + 1;
    }
    $total = $Bangla + $English + $Math + $Ict;
    $marks = $total / $total_subject;

    if($Bangla<=31 || $English<=31 ||$Math <=31 || $Ict <=31){
      $grade = '<h4 style="color:Tomato;">f</h4>';
    }else{
        if ($marks > 0 && $marks <= 32) {
            $grade = 'F';
        }
        else if ($marks >= 33 && $marks <= 39) {
            $grade = 'D';
        }
        else if ($marks >= 40 && $marks <= 49) {
            $grade = 'C';
        }
        else if ($marks >= 50 && $marks <= 59) {
            $grade = 'B';
        }
        else if ($marks >= 60 && $marks <= 69) {
            $grade = 'A-';
        }
        else if ($marks >= 70 && $marks <= 79) {
            $grade = 'A';
        }
        else if ($marks >= 80 && $marks <= 100) {
            $grade = 'A+';
        }
        else {
            $grade = "Soory";
        }
    }
    $img= $_FILES["img"]["name"];
    $tempname = $_FILES["img"]["tmp_name"];
    move_uploaded_file($tempname, 'upload/' . $img);   
    //
    $insart = "INSERT INTO cal(name,roall,bangla,english,math,ict,total,avz,grade,img) 
    VAlUE('$Name','$Roall','$Bangla','$English','$Math','$Ict','$total','$marks','$grade','$img')";
    $query = mysqli_query($connect, $insart);
    header("location:cal.php");
  
    if ($query) {
       $mess ='ok';
    }
    else {
        $mess ="no";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php mysql exam mark calculator</title>
    <?php include 'link1.php'; ?>
    <link rel="stylesheet" href="link1.css">
    <link rel="stylesheet" href="top.css">
</head>
<body>
    <!--  -->
<div class="input-group">
        <div class="form-outline">
            <form method="POST">
                <input name="Search"  class="from-control mb-2" type="search" placeholder="search" />
        </div>
        <button name="Search_btn">submit</button>
        </form>
    </div>
    <!--  -->
    <h1 class=" container">php mysql exam mark calculator </h1>
    </br>
    <hr>
    <h1 class=" container"><?php echo $mess ?> </h1>
    <!--  -->
    <div class="container-fluid">
        <form method="POST" class="text-danger " enctype="multipart/form-data">
            <!-- Name input -->
            <div class="form-outline mb-4">
                <input name="Name" type="text" id="form5Example1" class="form-control" />
                <label class="form-label">Name</label>
            </div>
            <!-- Email input -->
            <div class="form-outline mb-4">
                <input name="Roall" type="number" id="form5Example2" class="form-control" />
                <label class="form-label">Roall</label>
            </div>
            <!-- number  -->
            <div class="form-outline mb-4">
                <input name="Bangla" type="number" id="form5Example2" class="form-control" />
                <label class="form-label">Bangla</label>
            </div>
            <!-- Open this select menu -->
            <div class="form-outline mb-4">
                <input name="English" type="number" id="form5Example2" class="form-control" />
                <label class="form-label">English</label>
            </div>
            <!--  -->
            <div class="form-outline mb-4">
                <input name="Math" type="number" id="form5Example2" class="form-control" />
                <label class="form-label">Math</label>
            </div>
            <!--  -->
            <div class="form-outline mb-4">
                <input name="Ict" type="number" id="form5Example2" class="form-control" />
                <label class="form-label">Ict</label>
            </div>
            <!-- upload img -->
            <div class="form-outline mb-4">
                <input type="file" name="img">
            </div>
            <!-- Submit button -->
            <button type="submit" name="Submit2" class="btn btn-primary btn-block mb-4">submit</button>
        </form>
    </div>
    <!--  -->
    <?php
    $query = "SELECT * FROM cal WHERE id";
    $result = mysqli_query($connect, $query);
    $crunt=mysqli_num_rows($result);
    echo "<h1 class=''>crunt  =  $crunt</h1>";
    ?>
    <br>
    <!--  -->
    <table class="table table-striped table-hover table-bordered container e" >

        <th style="color:Tomato;">Name</th>
        <th>roall</th>
        <th>bangla</th>
        <th>english</th>
        <th>math</th>
        <th>ict</th>
        <th>total</th>
        <th>avz</th>
        <th>grade</th>
        <th>img</th>
        <th>DELETE</th>
        <?php 
        // 
        $Search="";
        if(isset($_POST['Search_btn'])){
            $Search =$_POST['Search'];
        }
        // 
    $query = "SELECT * FROM cal  WHERE 	name LIKE '%$Search%' ORDER BY id DESC";
    $result = mysqli_query($connect, $query);
    $i=1;
        while($row = mysqli_fetch_array($result)){ ?>
        <tr>        <td><a href=""><?php echo $row['name'] ?></a></td>
            
            <td> <?php echo $row['roall']  ?> </td>
            <td> <?php echo $row['bangla']  ?> </td>
            <td> <?php echo $row['english']  ?> </td>
            <td> <?php echo $row['math']  ?> </td>
            <td><?php echo $row['ict']  ?></td>
            <td><?php echo $row['total']  ?> </td>
            <td><?php echo $row['avz']  ?> </td>
            <td><?php echo $row['grade']  ?> </td>
            <td><img style="width: 70px; height: 60px;  border-radius: 50%" src="upload/<?php echo $row["img"]; ?>">

            <td><a class="btn bg-info text-dark btn-block mb-1"
                    href="/new1/delete.php?IDNO=<?php echo $row['id'];?>">DELETE</a> </td>
                    
         
        </tr>
        <?php $i++;}?>
    </table>
</body>

</html>