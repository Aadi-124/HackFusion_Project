<?php
    session_start();

    if(isset($_POST['login_btn']))
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        include("config/connection.php");
        $query = "select RegNo, fullname, password, role, email FROM users WHERE accountstatus='ACTIVE' AND email = '$email' AND password='$password';";
        
        $result = mysqli_query($connect, $query);

        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                $admin_RegNo = $row['RegNo'];
                $admin_fullname = $row['fullname'];
                $admin_role = $row['role'];
                $admin_email = $row['email'];
                $admin_pass = $row['password'];
            }
            mysqli_close($connect);
            if(strtoupper($admin_role) == 'STUDENT' || strtoupper($admin_role) == 'FACULTY')
            {
                $_SESSION['admin_auth'] = true;
                $_SESSION['auth_admin'] = [
                    'admin_regno' => $admin_id,
                    'admin_fullname' => $admin_fullname,
                    'admin_role' => $admin_role,
                    'admin_email' => $admin_email,
                    'admin_pass' => $admin_pass,
                ];

                $_SESSION['status'] = "Logged In Successfully";
                header("Location: index.php");
            }
            else
            {
                $_SESSION['status'] = "Invalid Email or Password.";
                header("Location: login.php");   
            }

        }else{
            $_SESSION['status'] = "User Not Found.";
                header("Location: login.php");   
        }
        
    }
    else
    {
        $_SESSION['status'] = "Access Denied";
        header("Location: login.php");
    }
?>