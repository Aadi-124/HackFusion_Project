<?php 
// include("authentication.php");
include("includes/header.php");
include("includes/topbar.php");
include("includes/sidebar.php");
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
              <li class="breadcrumb-item active">Student</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
      </div><!-- /.content-header -->

      <div class="container">
        <div class="row">
          <div class="col-md-12">
          <?php include("message.php"); ?>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Faculty</h3>
                </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Sr. No.</th>
                      <th>Registration No.</th>
                      <th>Full Name</th>
                      <th>Department</th>
                      <th>Action</th>
                    </tr>
                    <?php
                    $i = 1;
                      include("config/connection.php");
                      $query = "select users.RegNo, users.fullname, department.deptname, users.accountstatus FROM users inner join department on users.deptno = department.id WHERE users.accountstatus = 'DEACTIVE' and users.role='FACULTY'";
                      
                      $result = mysqli_query($connect, $query);
                      if(mysqli_num_rows($result) > 0)
                      {
                        
                          while($row = mysqli_fetch_assoc($result)){

                       ?>
                    <tr>
                      <td class="text-center"><?php echo $i++; ?></td>
                      <td class="text"><?php echo $row['RegNo']; ?></td>
                      <td class="text"><?php echo "Prof. ".$row['fullname']; ?></td>
                      <td class="text"><?php echo $row['deptname']; ?></td>
                      <td align="center">
                        <button type="button" class="btn btn-flat btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">Action
                          <span class="sr-only">Toggle Dropdown</span></button>
                            <div class="dropdown-menu" role="menu">
                              <a class="dropdown-item view_data" href="faculty-profile.php?id=<?php echo $row['RegNo'] ?>" data-id ="<?php echo $row['RegNo'] ?>&page=studprof"><span class="fa fa-eye text-dark"></span> View</a>
                              <div class="dropdown-divider"></div>
                              <button type="button" value="<?php echo $row['RegNo'] ?>" class="dropdown-item delete_data"><span class="fa fa-trash text-danger"></span> Delete</button>
                            </div>
                      </td>
						        </tr>
                    <?php 
                       }
                    }else{
                      $_SESSION['status'] = "No Data Found...";
                    }
                    ?> 
                  </thead>
                  <tbody>
                    
                  </tbody>
                </table>
                   
             </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php
include("includes/footer.php");
?>