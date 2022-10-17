<?php
session_start();
include "/config.php";
$students=$_GET["students"];
$_SESSION["students"]=$students;
$res=mysqli_query($con, "select * from students where email='$sudents'");
while($row=mysqli_fetch_array($res))
{
    $_SESSION["email"]=$row["email"];
}
?>