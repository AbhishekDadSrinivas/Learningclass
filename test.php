<!doctype html>
	<html>
	<body style="background-color: black;">
<?php
error_reporting(0);
session_start();
$testname=$_POST["testname"];
$edob=$_POST["edob"];
$ses=$_SESSION["teach"];
$tid;
 //database connection
$conn = new mysqli('localhost','root','','learningclass');
if($conn->connect_error){
    die('connection failed : '.$conn->connect_error);
}
$sql1= "SELECT * FROM teacher WHERE temailid='".$ses."'";
$result1 = mysqli_query($conn, $sql1);
         $resultcheck1 = mysqli_num_rows($result1);
         if($resultcheck1 > 0){
           while($row = mysqli_fetch_assoc($result1)){
             $tid= $row['tid'];
     }
  }
$sql= "INSERT INTO test(testname, edob, tid) VALUES('$testname', '$edob', '$tid')";
    if($conn->query($sql)){
        
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo '<span style="font-size:50px; color:white;"><b><center>CREATED TEST SUCESSFULLY</b></span>';
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
        echo '<span style="font-size:50px; color:white;"><b><center>TEST NOT CREATED</b></span>';
    }
?>
</body>
</html>