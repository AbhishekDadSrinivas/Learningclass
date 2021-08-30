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
    table, th{
            font-size: 30px;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
            color: white;
            margin-top: -50px;
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
.nos{
    font-size: 30px;
    font-weight: bold;
    padding-left: 540px;
   color: white;
   margin-top: 10px;
}
.subinfo{
    font-size: 30px;
    font-weight: bold;
    padding-left: 540px;
   color: white;
}
.subjects{
    font-size: 30px;
    font-weight: bold;
    padding-left: 580px;
   color: white;
}
.btn{
    color: black;
    background-color: yellow;
    font-weight: bold;
}
table, th, td{
            border: 3px solid white;
            border-collapse: collapse;
            font-size: 25px;
            padding-top: 15px;
            padding-bottom: 15px;
            width: 40%;
            color: white;
            margin-top: -40px;
            margin-left: -50px;
        }
        .dashbtn{
            width: 100%;
            font-size: 30px;
            border: 2px solid white;
            background-image: linear-gradient(blue, lightgreen);
            border-radius: 3px;
            box-shadow: 0px 1px 4px -2px #333;
            text-shadow: 0px -1px #333;
            background-color: green;
        }
        .dashbtn:hover{
            background: linear-gradient(#073, #0fa);
        }
</style>
     <body>
<?php
error_reporting(0);
session_start();
$emailid=$_POST["emailid"];
$password=$_POST["password"];
 //database connection
$conn = new mysqli('localhost','root','','learningclass');
if($conn->connect_error){
    die('connection failed : '.$conn->connect_error);
}
elseif(isset($_POST["emailid"], $_POST["password"])){
    $result1  = mysqli_query($conn,"SELECT semailid, sconpswd FROM student WHERE semailid = '".$emailid."' AND sconpswd='".$password."'");
     if(mysqli_num_rows($result1)>0)
     {
         $_SESSION["logged_in"]= true;
         $_SESSION["naam"] = $emailid;
         ?>
         <!DOCTYPE html>
        <html>
        <body>
            <div class="logo">
           <img src="images/teach1.png" alt="LEARNING CLASS">
         </div>
         <div class="welcome">
         <?php
            $sql = "SELECT * FROM student WHERE semailid = '".$emailid."'";
         $result = mysqli_query($conn, $sql);
         $resultcheck = mysqli_num_rows($result);
         if($resultcheck > 0){
           while($row = mysqli_fetch_assoc($result)){
             echo ("WELCOME,  ".$row['sfname']."<br>");
             echo "<br>";
             break;
     }
  }
         ?>
     </div>
     <div class="nos">
         <?php
            $sql1 = "SELECT * FROM student WHERE semailid = '".$emailid."' AND tid<>0";
         $result1 = mysqli_query($conn, $sql1);
         $resultcheck1 = mysqli_num_rows($result1);
         if($resultcheck1 > 0){
          echo ("Number Of Subjects Enrolled:".$resultcheck."<br>");
          echo "<br>";

  }
  else
  {
    echo ("Number Of Subjects Enrolled: 0<br>");
          echo "<br>";
  }
         ?>
     </div>
     <div class="subinfo">
        <?php
        $sql2= "SELECT * FROM student natural join teacher WHERE semailid = '".$emailid."' AND tid<>0 ";
        $result2 = mysqli_query($conn, $sql2);
        $resultcheck2 = mysqli_num_rows($result2);
         if($resultcheck2 > 0){
          while($row = mysqli_fetch_assoc($result2)){
             $subinfo="->".$row['teachingsub']." Taught By ".$row['tfname'];
             echo $subinfo;
             echo "<br>";
             echo "<br>";
     }

  }
  ?>
     </div>
     <div class="subjects">
        <h1><u>SUBJECTS</u></h1>
        <form action="enroll.php" method="post">
        <table><tr><th><label>->Social Science</label></th>
        <th><button type="submit" class="btn" name="enroll" value="2">Enroll</button><br></th></tr></table><br>
        <table><tr><th><label>->Computer Science</label></th>
        <th><button type="submit" class="btn" name="enroll" value="3">Enroll</button><br></th></tr></table><br>
        <table><tr><th><label>->Biology</label></th>
        <th><button type="submit" class="btn" name="enroll" value="4">Enroll</button><br></th></tr></table><br>
     </div>
     <br>
     <form action="dashboard.php" method="post">
        <button type="submit" class="dashbtn"><a href="dashboard.php">DASHBOARD</a></button>
     </form>
        </body>
        <?php
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
        echo '<span style= "color:white; font-size: 30px;"><center>THE USERNAME OR PASSWORD IS INCORRECT</center></span>';
        echo "<br>";
        echo "<br>";
        ?>
        <!DOCTYPE html>
        <html>
        <style>
        .clink{
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
        <center><br>
            <a href="student.html" class="clink">LOGIN FORM</a>
        </center>
        </body>
        </html>
        <?php
     }
 }
?>  
 </body>
</html>       