<?php
    if(isset($_POST['register-btn']))
    {
        
        $role = $_POST['radio1'];
        $idcode = strtoupper(trim($_POST['RegID']));
        $fullname = strtoupper(trim($_POST['name']));
        $email = strtolower(trim($_POST['email']));
        $pass = $_POST['pass'];
        $conpass = $_POST['conpass'];
        $img = preg_replace("/\s+/","_", $_FILES['profile']['name']);
        $img_type = $_FILES['profile']['type'];
        $img_size = $_FILES['profile']['size'];
        $img_tem_loc = $_FILES['profile']['tmp_name'];
        $img_ext = pathinfo($img, PATHINFO_EXTENSION);
        $img_name = pathinfo($img, PATHINFO_FILENAME);
        $img_unique_name = $img_name."_".date("mjYHis").".".$img_ext;
        $img_store = "../Documents/".$img_unique_name;
        move_uploaded_file($img_tem_loc, $img_store);
        
        
        include("config/connection.php");
        $query = "select *from users where email = '$email'";
        $result = mysqli_query($connect, $query);
        
        if(mysqli_num_rows($result) > 0)
        {
            
            $_SESSION['status'] = "Email Already Exists...";
            header("Location: register.php");
        }
        else
        {   
            
           
            // Fetch department ID
            $deptcode = strtoupper(substr($idcode, 4, 3));
            $sql = "select id FROM department WHERE deptcode = '$deptcode'";
            $res = mysqli_query($connect, $sql);
            $r = mysqli_fetch_assoc($res);
            $deptno = $r['id'];

            

            $query = "insert into users values('$idcode', '$fullname', $deptno, '$email', '$pass', '$role', '$img_unique_name', 'DEACTIVE')";
            if(mysqli_query($connect, $query))
            {echo "hi";
                $_SESSION['status'] = "Student Added successfully...";
                mysqli_close($connect);
                header("Location: login.php");
            }
            
            
        }
    }
    ?>



