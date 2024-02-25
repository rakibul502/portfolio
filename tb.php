<?php
include 'datacun.php';
if (isset($_POST["Submit"])) {
    $nname = $_POST["Name"];
    $u_number = $_POST["Number"];
    $u_email = $_POST["Email"];
    $option = $_POST["Option"];
    $name= $_FILES["file"]["name"];
    $tempname = $_FILES["file"]["tmp_name"];
    move_uploaded_file($tempname, 'upload/' . $name);
    
// php mysqli email velitation
    $query = "SELECT * FROM subb WHERE Email ='$u_email'";
    $result = mysqli_query($connect, $query);
    $crunt=mysqli_num_rows($result);
    if($crunt >0){
        echo "<script>alert('email address already exists');</script>"; 
    }else{
        $query = "INSERT INTO subb(Name,Eumber,Email,eption,img) VAlUE('$nname','$u_number','$u_email','$option','$name')";
        // $query = "INSERT INTO subb(Name,Email,Eumber,eption) VAlUE('$nname','$u_email','$u_number', '$option')";
        $query = mysqli_query($connect,$query);
        if ($query) {
            $message = "rejester success";
        }
        else {
         $message = "rejester not success";
        }
    }
// 
}

if (isset($_POST["Submit1"])) {
    $relieving = $_POST["relieving"];
    $apple = $_POST["apple"];
    $display = $_POST["display"];
    $Pro_stand = $_POST["Pro_stand"];
    $Vesa_Mount = $_POST["Vesa_Mount"];
    $Total = $_POST["Total"];
    $img= $_FILES["img"]["name"];
    $tempname = $_FILES["img"]["tmp_name"];
    move_uploaded_file($tempname, 'upload/' . $img);
    $query = "INSERT INTO card(Believing,Apple,Display,Pro_stand,Vesa_Mount,Total,img) 
    VAlUE('$relieving','$apple','$display','$Pro_stand','$Vesa_Mount','$Total','$img')";
     $query = mysqli_query($connect,$query);
     if ($query) {
        $message = "rejester success";
    }
    else {
        $message = "rejester not success";
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
    <link rel="stylesheet" href="link1.css">
    <link rel="stylesheet" href="top.css">
</head>

<body>

    <!--  -->

    <div class="container a ">
        <form method="POST" class="text-danger b" enctype="multipart/form-data">
            <!-- Name input -->
            <div class="form-outline mb-4">
                <input name="Name" type="text" id="form5Example1" class="form-control" />
                <label class="form-label">Name</label>
            </div>
            <!-- Email input -->
            <div class="form-outline mb-4">
                <input name="Number" type="text" id="form5Example2" class="form-control" />
                <label class="form-label">Email address</label>
            </div>
            <!-- number  -->
            <div class="form-outline mb-4">
                <input name="Email" type="Email" id="form5Example2" class="form-control" />
                <label class="form-label">number</label>
            </div>
            <!-- Open this select menu -->
            <div class="form-outline mb-4">
                <select name="Option" class="form-select" aria-label="Default select example">
                    <option>One</option>
                    <option>Two</option>
                    <option>Three</option>
                    <option>fore</option>
                    <option>five</option>
                </select>
            </div>
            <!-- upload img -->
            <div class="form-outline mb-4">
                <input type="file" name="file">
            </div>
            <!-- Submit button -->
            <button type="submit" name="Submit" class="btn btn-primary btn-block mb-4">submit</button>
        </form>
    </div>
    <br>
    <h1 class="d container">insert data PHP MySQL AND READ DATA PHP MYSQL </h1>
    <!-- crunt -->
    <!-- Search  -->

    <div class="input-group">
        <div class="form-outline">
            <form method="POST">
                <input name="Search"  class="from-control mb-2" type="search" placeholder="search" />
        </div>
        <button name="Search_btn">submit</button>
        </form>
    </div>
    <!--  -->
    <?php
    $query = "SELECT * FROM subb WHERE id";
    $result = mysqli_query($connect, $query);
    $crunt=mysqli_num_rows($result);
    echo "<h1 class=''>crunt  =  $crunt</h1>";
    ?>
    <br>
    <table class="table table-striped table-hover table-bordered container e">
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Number</th>
        <th>Option</th>
        <th>img</th>
        <th>EDIT</th>
        <th>DELETE</th>
        <?php 
        // 
        $Searc="";
        if(isset($_POST['Search_btn'])){
            $Searc =$_POST['Search'];
        }
        // 
    $query = "SELECT * FROM subb  WHERE Name LIKE '%$Searc%' ORDER BY id DESC";
    $result = mysqli_query($connect, $query);
    $i=1;
        while($row = mysqli_fetch_array($result)){ ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td> <?php echo $row['Name']  ?> </td>
            <td> <?php echo $row['Email']  ?> </td>
            <td> <?php echo $row['Eumber']  ?> </td>
            <td> <?php echo $row['eption']  ?> </td>
            <td><img style="width: 70px; height: 60px;  border-radius: 50%" src="upload/<?php echo $row["img"]; ?>">
            </td>
            <td><a class="btn bg-danger text-white btn-block"
                    href="/new1/edit.php?IDNO=<?php echo $row['id'];?>">EDIT</a> </td>
            <td><a class="btn bg-info text-dark btn-block mb-1"
                    href="/new1/delete.php?IDNO=<?php echo $row['id'];?>">DELETE</a> </td>
        </tr>
        <?php $i++;}?>
    </table>
<!--  -->
<?php
    $query = "SELECT * FROM card WHERE id";
    $result = mysqli_query($connect, $query);
    $crunt=mysqli_num_rows($result);
    echo "<h1 class=''>card0  =  $crunt</h1>";
    ?>
    <br>
    <!-- Prodsct card From -->
    <div class="container ">
        <form method="POST" class="text-danger " enctype="multipart/form-data">
            <!-- Name input -->
            <div class="form-outline mb-4">
                <input name="relieving" type="text" id="form5Example1" class="form-control" />
                <label class="form-label">Believing</label>
            </div>
            <!-- Email input -->
            <div class="form-outline mb-4">
                <input name="apple" type="text" id="form5Example2" class="form-control" />
                <label class="form-label">Apple pro display XDR</label>
            </div>
            <!-- number  -->
            <div class="form-outline mb-4">
                <input name="display" type="text" id="form5Example2" class="form-control" />
                <label class="form-label">Pro Display XDR</label>
            </div>
            <!-- Open this select menu -->
            <div class="form-outline mb-4">
                <input name="Pro_stand" type="text" id="form5Example2" class="form-control" />
                <label class="form-label">Pro stand</label>
            </div>
            <!--  -->
            <div class="form-outline mb-4">
                <input name="Vesa_Mount" type="text" id="form5Example2" class="form-control" />
                <label class="form-label">Vesa Mount Adapter</label>
            </div>
            <!--  -->
            <div class="form-outline mb-4">
                <input name="Total" type="text" id="form5Example2" class="form-control" />
                <label class="form-label">Total</label>
            </div>
            <!-- upload img -->
            <div class="form-outline mb-4">
                <input type="file" name="img">
            </div>
            <!-- Submit button -->
            <button type="submit" name="Submit1" class="btn btn-primary btn-block mb-4">submit</button>
        </form>
        <!-- Prodsct card -->
        <div class="containerd ">
            <?php 
             $Searc="";
             if(isset($_POST['Search_btn'])){
                 $Searc =$_POST['Search'];
     
             }
    $query = "SELECT * FROM card WHERE Believing LIKE '%$Searc%' ORDER BY id DESC";
    $result = mysqli_query($connect, $query);

        while($row1 = mysqli_fetch_array($result)){ ?>

            <div class="row">
                <div class="col-sm-4 ">
                    <div class="card ">
                        <i class="fab fa-apple fa-lg pt-3 pb-1 px-3"><span class="">
                                <a class="btn btn-block mb-1" href="/new1/delete.php?IDNO=<?php echo $row1['id'];?>"><i
                                        style="" class="fa fa-trash " aria-hidden="true"></i>
                                </a>
                            </span></i>
                        <img src="upload/<?php echo $row1['img']?>" class="card-img-top" alt="Apple Computer" />
                        <div class="card-body">
                            <div class="text-center">
                                <h5 class="card-title"><?php echo $row1['Believing']?></h5>
                                <p class="text-muted mb-4"><?php echo $row1['Apple']?></p>
                            </div>
                            <div>
                                <div class="d-flex justify-content-between">
                                    <span><?php echo $row1['Display']?></span><span>11$</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span><?php echo $row1['Pro_stand']?></span><span>22$</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span><?php echo $row1['Vesa_Mount']?></span><span>33$</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between total font-weight-bold mt-4">
                                <span>Total<?php echo $row1['Total']?></span><span>44$</span>
                            </div>

                        </div>
                    </div>
                </div>
                <!--  -->

                <!--  -->
            </div>

            <?php ;}?>

        </div>
</body>

</html>