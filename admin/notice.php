<?php 
// include("authentication.php");
include("includes/header.php");
include("includes/topbar.php");
include("includes/sidebar.php");
?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">

 <div class="modal fade" id="AddNoticeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Notice</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action ="#" method ="POST">
            <div class="modal-body">
                <div class="row">
                  <div class="col">
                    <div class="form-group">
                      <label for ="message">Message</label>
                      <textarea name="message" row="" value="" class="form-control" placeholder="Enter Notice Message Here..." required></textarea>
                    </div>
                  </div>
                </div>
              </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="upload_notice">Upload</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <?php 
    if(isset($_POST['upload_notice']))
    {
        $message = ucwords(trim($_POST['message']));

        include("config/connection.php");

        $sql = "insert into notice(`message`, `timestamp`) values('$message', CURRENT_TIMESTAMP)";

        if(mysqli_query($connect, $sql))
        {
            $_SESSION['status'] = "Notice Uploaded Successfully...";
        }
        mysqli_close($connect);
    }
    ?>
    <!-- Modal delete date -->
  <div class="modal fade" id="DeleteDataConfirmation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="confirmationLabel">confirmation</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="" method= "POST">
          <div class="modal-body">
            <input type="hidden" name="id" id="id">
            Are your sure to Delete? 
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-danger" name="RemoveRole">YES</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
            </div>
            </form>
        </div>
      </div>
    </div>

    <?php
    if(isset($_POST['RemoveRole']))
    {
        $id = $_POST['id'];
        include("config/connection.php");
        $query = "delete from notice where id = '$id'";
        mysqli_query($connect, $query);
        mysqli_close($connect);
    }
    ?>

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
              <li class="breadcrumb-item active">Notice</li>
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
                <h3 class="card-title">Notice</h3>
                <a href="#" data-toggle="modal" data-target="#AddNoticeModal" class = "btn btn-primary float-right">Add Notice</a>
                </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  
                    <tr>
                      <th class="col-1">Sr. No.</th>
                      <th>Notice</th>
                      <th class="col-3">Date</th>
                      <th class="col-2">Action</th>
                    </tr>
                    <?php
                    $i = 1;
                      include("config/connection.php");
                      $query = "select message, timestamp FROM notice ";
                      
                      $result = mysqli_query($connect, $query);
                      if(mysqli_num_rows($result) > 0)
                      {
                        
                          while($row = mysqli_fetch_assoc($result)){

                       ?>
                    <tr>
                      <td class="text-center"><?php echo $i++; ?></td>
                      <td class="text"><?php echo $row['message']; ?></td>
                      <td class="text"><?php echo date("M d, Y h:i A",strtotime($row['timestamp'])); ?></td>
                      <td align="center">
                        <button type="button" class="btn btn-flat btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">Action
                          <span class="sr-only">Toggle Dropdown</span></button>
                            <div class="dropdown-menu" role="menu">
                              <a href="#" data-toggle="modal" data-target="#DeleteDataConfirmation">
                              <button type="button" value="<?php echo $row['id'] ?>" class="dropdown-item delete_data"><span class="fa fa-trash text-danger"></span> Delete</button></a>
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
 

<script>
  $(document).ready(function (){
    $('.delete_data').click(function (e) {
      e.preventDefault();
      var usr_id = $(this).val();

      $('#stud_id').val(usr_id);
      $('#DeleteDataConfirmation').modal('show');
      
    });
  });
</script>
 
<?php
include("includes/footer.php");
?>