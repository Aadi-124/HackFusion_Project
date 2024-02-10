<?php 
// include("authentication.php");
include("includes/header.php");
include("includes/topbar.php");
include("includes/sidebar.php");

include("config/connection.php");
$RegNo = $_GET['id'];
$query = "select u.RegNo, u.fullname, u.email, u.profile, d.deptname FROM users AS u INNER JOIN department AS d ON u.deptno = d.id WHERE u.RegNo = '$RegNo'";
$result = mysqli_query($connect, $query);
$row = mysqli_fetch_assoc($result);
mysqli_close($connect);

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Users</li>
                        <li class="breadcrumb-item active">User Profile</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">User Profile</h3>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-md-auto text-center">
                                    <div class="row align-items-start">
                                        <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius" alt="User-Profile-Image">
                                    </div>
                                    <div class="row align-item-end">
                                        <p class="text-center"></p>
                                    </div>
                                    <div class="row align-item-end">
                                    
                                        
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="col-auto">
                                <h6 class="text-bold">-- Details --</h6>
                                    <div class="row">
                                        <div class="col">
                                            <p class="m-b-10 f-w-600">Full Name : </p>
                                            <h6 class="text-muted f-w-400"><i><?php echo ucwords($row['fullname'])?></i></h6> 
                                        </div>
                                        <div class="col">
                                            <p class="m-b-10 f-w-600">Department :</p>
                                            <h6 class="text-muted f-w-400"><i><?php echo ucwords($row['deptname'])?></i></h6>
                                        </div
                                    </div>
                                    <div class="row">
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <p class="m-b-10 f-w-600">Email : </p>
                                            <h6 class="text-muted f-w-400"><i><?php echo $row['email']?></i></h6>
                                        </div>
                                    </div>
                                    
                            </div>
                            <hr>
                            <div class="col-auto">
                                    <div class="row">
                                        <div class="col">
                                        
                                            <p class="m-b-10 f-w-600">ID Card : </p>
                                            <img src="../Documents/<?php echo $row['profile']; ?>" alt="">
                                        </div>
                                    </div>
                            </div>
                            <hr>
                            <div class="col-auto">
                            <div class="d-flex align-items-center">
                                <a href="./student.php" class="btn btn-primary"><i class="fa fa-angle-left"></i> Back to List</a>
                                <div class="col-10  ">
                                  <form action = "code.php" method = "post">
                                <button type="submit" value="<?php echo $row['RegNo']; ?>" name = "reg_approve" class="btn bg-gradient-success">Approve</button>
                                <button type="submit" value="<?php echo $row['RegNo']; ?>" name = "reg_reject" class="btn bg-gradient-danger">Reject</button>
                                </form>
                              </div>
                             </div>
                             
                          </div>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include("includes/script.php");
include("includes/footer.php");
?>