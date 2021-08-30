<!doctype html>
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

 .stable{
    font-size: 40px;
    font-weight: bold;
    padding-left: 150px;
   color: white;
   margin-top: -70px;
}
table, th, td{
            border: 1px solid white;
            border-collapse: collapse;
            font-size: 20px;
            margin-left: 300px;
            width: 50%;
            color: white;
            margin-top: -50px;
        }
        th, td{
            padding: 15px;
        }
        th{
            text-align: left;
        }
    </style>
    <body>
<?php
error_reporting(0);
session_start();
$ses=$_SESSION["naam"];
$tid;
 //database connection
$conn = new mysqli('localhost','root','','learningclass');
if($conn->connect_error){
    die('connection failed : '.$conn->connect_error);
}
?>
<div class="stable">
    <br>
    <center><h1>ASSIGNMENTS</h1></center>
    <?php
    $sql2 = "SELECT aname, sdob, ldob FROM assignments WHERE tid in(SELECT tid FROM student natural join teacher WHERE semailid='".$ses."' AND tid<>0)";
    $result2 = mysqli_query($conn, $sql2);
    $resultcheck2 = mysqli_num_rows($result2);
    if($resultcheck2 > 0){
        echo "<table><tr><th>Assignment Name</th><th>Start Date</th><th>Last Date</th></tr>";
    while($row3 = mysqli_fetch_assoc($result2)){
    echo "<tr><td>".$row3["aname"]."</td><td>".$row3["sdob"]."</td><td>".$row3["ldob"]."</td></tr>";
     }
        echo "</table>";
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
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo '<span style= "color:white; font-size: 30px;"><center>NO ASSIGNMNTS HAVE BEEN GIVEN</center></span>';
    }
    ?>
    <br>
    <center><h1>TEST</h1></center>
    <?php
   $sql3 = "SELECT * FROM (teacher natural join test) natural join student WHERE semailid='".$ses."' AND tid<>0";
    $result3 = mysqli_query($conn, $sql3);
    $resultcheck3 = mysqli_num_rows($result3);
    if($resultcheck3 > 0){
        echo "<table><tr><th>Subject Name</th><th>Test Name</th><th>Examination Date</th><tr>";
    while($row3 = mysqli_fetch_assoc($result3)){
    echo "<tr><td>".$row3["teachingsub"]."</td><td>".$row3["testname"]."</td><td>".$row3["edob"]."</td></tr>";
     }
        echo "</table>";
    } 
?>
</div>
</body>
</html>
