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
          
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Registered Student</h3>
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
                      <th>Year</th>
                      <th>Status</th>
                    </tr>
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