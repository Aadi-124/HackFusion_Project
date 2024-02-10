
<?php 
session_start();
include("includes/header.php");
if(isset($_SESSION['admin_auth']))
{
    $_SESSION['status'] = "You are already logged In.";
    header("Location: index.php");
    exit(0);
}
?>
<div class="login-page">

<div class="login-box">
  <div class="login-logo">
    <b>Users Login</b>
  </div>
  <?php
            if(isset($_SESSION['auth_status']))
            {
                ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Hey! </strong><?php echo $_SESSION['auth_status']; ?>
                    <button type="button" class ="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
                unset($_SESSION['auth_status']);
            }

            ?>
            <?php 
                include("message.php");
            ?>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in</p>

      <form action="login-code.php" method="post">
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email" />
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" />
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" name="login_btn"class="btn btn-primary btn-block">
              Sign In
            </button>
          </div>
          <!-- /.col -->
        </div>
      </form>


      <p class="mb-1">
        <a href="forgot-password.php">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.php" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
  
</div>

<?php
include('includes/footer.php');
?>
