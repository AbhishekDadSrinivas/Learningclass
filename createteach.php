<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="pstyle.css">
    </head>
    <style>
    body {
    background-image: url('images/backg.png');
    background-position: center center;
    background-size: cover;
    height: 100vh;
}
</style>
     <body>
<?php
$fname=$_POST["fname"];
$lname=$_POST["lname"];
$pno=$_POST["pno"];
$emailid=$_POST["emailid"];
$teachingsub=$_POST["teachingsub"];
$gender=$_POST["gender"];
$dob=$_POST["dob"];
$crtpswd=$_POST["crtpswd"];
$conpswd=$_POST["conpswd"];
$conn = new mysqli('localhost','root','','learningclass');
if($conn->connect_error){
    die('connrction failed : '.$conn->connect_error);
}
$result1  = mysqli_query($conn,"SELECT temailid, tconpswd FROM teacher WHERE temailid = '".$emailid."'");
if(mysqli_num_rows($result1)>0){
    echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo '<span style="font-size:50px"><b><center>EMAIL ID ALREADY EXISTS</b></span>';
        ?>
        <!DOCTYPE html>
        <html>
        <style>
        .lolink{
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
            <a href="teacher.html" class="lolink">LOGIN</a>
        </center>
        </body>
        </html>
        <?php
}
else{
    if($crtpswd==$conpswd){
    $sql= "INSERT INTO teacher(tfname, tlname, tpno, temailid, teachingsub, tgender, tdob, tcrtpswd, tconpswd) VALUES('$fname', '$lname', '$pno', '$emailid', '$teachingsub', '$gender', '$dob', '$crtpswd', '$conpswd')";
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
        echo '<span style="font-size:50px"><b><center>CREATED ACCOUNT SUCESSFULLY</b></span>';
        ?>
        <!DOCTYPE html>
        <html>
        <style>
        .lolink1{
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
            <a href="teacher.html" class="lolink1"><b>LOGIN</b></a>
        </center>
        </body>
        </html>
        <?php
    }
    else{
        echo "error: ".$sql."<br>".$conn->error;
    }
    $conn->close();
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
        echo '<span style="font-size:50px"><b><center>WARNING: THE PASSWORD MUST BE SAME</b></span>';
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
            <a href="createaccteach.html" class="clink">CLICK HERE</a>
        </center>
        </body>
        </html>
        <?php
    }
    
    
}
?>
    </body>
</html>