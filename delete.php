<?php
include 'datacun.php';
 $id = $_GET["IDNO"];
 $deleted = " DELETE FROM subb WHERE id=$id";
 $runQuery = mysqli_query($connect,$deleted);
if ($runQuery) {
    echo "Record deleted successfully";
        header("location:tb.php");
}
else{
    echo "Record deleted NOT successfully";
}

include 'datacun.php';
 $id = $_GET["IDNO"];
 $deleted = " DELETE FROM card WHERE id=$id";
 $runQuery = mysqli_query($connect,$deleted);
if ($runQuery) {
    echo "Record deleted successfully";
        header("location:tb.php");
}
else{
    echo "Record deleted NOT successfully";
}
// 
include 'datacun.php';
 $id = $_GET["IDNO"];
 $deleted = " DELETE FROM cal WHERE id=$id";
 $runQuery = mysqli_query($connect,$deleted);
if ($runQuery) {
    echo "Record deleted successfully";
        header("location:cal.php");
}
else{
    echo "Record deleted NOT successfully";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>



    
</head>

<body>
</body>

</html>