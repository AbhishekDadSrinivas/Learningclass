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
    .logo img{
    margin-top: -80px;
    width: 300px;
    padding-left: 30px;
    height: 300px;
}
.welcome{
    font-size: 30px;
    font-weight: bold;
    padding-left: 1230px;
    margin-top: -200px;
   color: white;
}
.subject{
    font-size: 40px;
    font-weight: bold;
    padding-left: 700px;
   color: white;
   margin-top: 10px;
}
.stable{
    font-size: 40px;
    font-weight: bold;
    padding-left: 150px;
   color: white;
   margin-top: 10px;
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
.abtn{
    cursor: pointer;
    border: 1px solid white;
    height: 50px;
    width: 200px;
    color: white;
    font-size: 50px;
    box-shadow: 0 6px 6px rgba(0,0,0,0.6);
    text-decoration: none;
}
</style>
     <body>
<?php
error_reporting(0);
session_start();
$tid;
$emailid=$_POST["emailid"];
$password=$_POST["password"];
 //database connection
$conn = new mysqli('localhost','root','','learningclass');
if($conn->connect_error){
    die('connection failed : '.$conn->connect_error);
}
elseif(isset($_POST["emailid"], $_POST["password"])){
    $result1  = mysqli_query($conn,"SELECT temailid, tconpswd FROM teacher WHERE temailid = '".$emailid."' AND tconpswd='".$password."'");
     if(mysqli_num_rows($result1)>0)
     {
         $_SESSION["logged_in"]= true;
         $_SESSION["teach"] = $emailid;
         ?>
         <!DOCTYPE html>
        <html>
        <body>
            <div class="logo">
           <img src="images/teach1.png" alt="LEARNING CLASS">
         </div>
         <div class="welcome">
         <?php
            $sql = "SELECT * FROM teacher WHERE temailid = '".$emailid."'";
         $result = mysqli_query($conn, $sql);
         $resultcheck = mysqli_num_rows($result);
         if($resultcheck > 0){
           while($row = mysqli_fetch_assoc($result)){
             echo ("WELCOME,  ".$row['tfname']."<br>");
             echo "<br>";
             break;
     }
  }
?>
</div>
  <div class="subject">
  <?php
  $sql1 = "SELECT * FROM teacher WHERE temailid = '".$emailid."'";
         $result1 = mysqli_query($conn, $sql1);
         $resultcheck1 = mysqli_num_rows($result1);
         if($resultcheck1 > 0){
           while($row = mysqli_fetch_assoc($result1)){
             $tid=$row['tid'];
             echo ("<u>".$row['teachingsub']."</u>"."<br>");
             echo "<br>";
             echo "<br>";
     }
  }
 ?>
</div>
<div class="stable">
    <?php
    $sql2 = "SELECT * FROM student WHERE tid = '".$tid."'";
    $result2 = mysqli_query($conn, $sql2);
    $resultcheck2 = mysqli_num_rows($result2);
    if($resultcheck2 > 0){
        echo "<table><tr><th>Student Name</th><th>Mobile No.</th><th>Emailid</th></tr>";
    while($row3 = mysqli_fetch_assoc($result2)){
    echo "<tr><td>".$row3["sfname"]."</td><td>".$row3["pno"]."</td><td>".$row3["semailid"]."</td></tr>";
     }
        echo "</table>";
    }
    else{
        echo "<br>";
        echo '<span style= "color:white; font-size: 30px;"><center>NO STUDENTS HAVE BEEN ENROLLED</center></span>';
        echo "<br>";
        echo "<br>";
    }
?>
<!DOCTYPE html>
        <html>
        <style>
        .student{
    padding-left: 370px;
    padding-top: 50px;
}
.student a{
    cursor: pointer;
    border: 1px solid white;
    height: 50px;
    width: 200px;
    color: white;
    font-size: 50px;
    box-shadow: 0 6px 6px rgba(0,0,0,0.6);
    text-decoration: none;
}
.tab{
    margin-left: 50px;
}
    </style>
        <body>
        <div class="student">
        <a href="assignment.html">ASSIGNMENT</a>
        <span class="tab"></span>
        <a href="test.html">TEST</a>
    </div>
        </body>
        </html>
<?php 
}
}
?>
</div>
</body>
</html>