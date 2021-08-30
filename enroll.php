<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
    </head>
    <style>
    body {
    background-image: url('images/bg6.jpg');
    background-position: center center;
    background-size: cover;
    height: 80vh;
}
</style>
<body>
    <?php
        $conn = new mysqli('localhost','root','','learningclass');
       if($conn->connect_error){
    die('connection failed : '.$conn->connect_error);
}
       $ses=$_SESSION["naam"];
       $tid=$_POST["enroll"];
       $sfname;
       $slname;
       $spno;
       $semailid;
       $sdob;
       $sgender;
       $scrtpswd;
       $sconpswd;
       $sql1= "SELECT * FROM student WHERE semailid = '".$ses."'";
       $result1 = mysqli_query($conn, $sql1);
        $resultcheck1 = mysqli_num_rows($result1);
         if($resultcheck1 > 0){
           while($row = mysqli_fetch_assoc($result1)){
             $sfname=$row['sfname'];
             $slname=$row['slname'];
             $spno=$row['pno'];
             $semailid=$row['semailid'];
             $sgender=$row['sgender'];
             $sdob=$row['sdob'];
             $scrtpswd=$row['scrtpswd'];
             $sconpswd=$row['sconpswd'];
         }

  }
  $sql3= "SELECT * FROM student WHERE semailid = '".$ses."' AND tid= '".$tid."' ";
       $result3 = mysqli_query($conn, $sql3);
        $resultcheck3 = mysqli_num_rows($result3);
        if($resultcheck3 == 0){
    $sql2= "INSERT INTO student(sfname, slname, pno, semailid, sgender, sdob, scrtpswd, sconpswd, tid) VALUES('$sfname', '$slname', '$spno', '$semailid', '$sgender', '$sdob', '$scrtpswd', '$sconpswd', '$tid')";
        if($conn->query($sql2)){
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo '<span style="font-size:50px; color: white;"><b><center>ENROLLED SUCESSFULLY</b></span>';
        }
    }
    else{
       echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo '<span style="font-size:50px; color: white;"><b><center>ALREADY ENROLLED</b></span>'; 
    }
    ?>
</body>
</html>