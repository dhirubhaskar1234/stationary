<?php include("include/header.php"); ?>
  <!-- Page -->
  <div class="page">
    <div class="page-content" style="margin-top: -21px;">
      
      <div class="col-md-6 col-lg-4">
              <!-- Example Icon Addon -->
        <div class="example-wrap">
          <h4 class="example-title">Change Password</h4>
          <?php
            if (isset($_GET['msg'])) {
              $msg=$_GET['msg'];
              if ($msg==1) {
                print '<div class="alert dark alert-icon alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
            </button>
              <i class="icon wb-check" aria-hidden="true"></i> Password updated successfully.
          </div>';
              }
            }


          ?>
          
        <form action="php/change_password.php" method="post">
          <div class="form-group">
            <div class="input-group input-group-icon">
              <span class="input-group-addon">
                <span class="icon wb-user" aria-hidden="true"></span>
              </span>
              <input type="text" name="user_name" class="form-control" placeholder="Username">
            </div>
          </div>
          <div class="form-group">
            <div class="input-group input-group-icon">
              <span class="input-group-addon">
                <span class="icon wb-lock" aria-hidden="true"></span>
              </span>
              <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
          </div>
          <div class="example example-buttons">
                  <button type="submit" name="submit" class="btn btn-animate btn-animate-side btn-success">
                    <span><i class="icon wb-pencil" aria-hidden="true"></i>Save Changes</span>
                  </button>
                
          </div>
        </form>   
        </div>
        <!-- End Example Icon Addon -->
      </div>
    </div>
  </div>
  <!-- End Page -->

<?php include("include/footer.php"); ?>



