<?php 
include("config/connection.php");
if(isset($_POST['reg_approve']))
{
    $regno = $_POST['reg_approve'];
    // echo $regno;
    $query = "update users set accountstatus='ACTIVE' where RegNo='$regno'";
    if(mysqli_query($connect, $query)){
        // $temp = strtolower($regno);
        $temp = "2023bit504@sggs.ac.in";
        // $to = $temp."@sggs.ac.in";
        $command = escapeshellcmd('python email.py '. $temp);
        $output = shell_exec($command);
        header("Location:student.php");
    }

}

if(isset($_POST['reg_reject']))
{
    $regno = $_POST['reg_reject'];
    // echo $regno;
    $query = "delete from users where RegNo='$regno'";
    if(mysqli_query($connect, $query)){
        header("Location:student.php");
    }

}