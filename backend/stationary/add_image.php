<?php 
include("include/header.php");
include("include/db.php");  

?>
  <div class="page">
  <div class="page-content" style="margin-top: -21px;">
    <form action="php/add_image.php" method="post" enctype="multipart/form-data">
    <div class="col-md-9 col-lg-7">
    	<?php
                  if (isset($_GET['msg'])) {
                    $msg=$_GET['msg'];
                    if ($msg==1) {
                        print '<div class="alert dark alert-icon alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
            </button>
              <i class="icon wb-check" aria-hidden="true"></i> Image added successfully.
          </div>';                  
                    }
                }    
        ?>            
      <label>Select event
      </label>
      <div class="form-group">
        <select class="form-control" name="event" required="">
          <option>Select event</option>
          <?php
          	$sql="SELECT * FROM `categories`";
          	if($result_sql=mysqli_query($connection,$sql)){
          		while($row=mysqli_fetch_assoc($result_sql)){
          			echo "<option value='$row[id]'>$row[cat_name]</option>";
          		}
          	}



          ?>
        </select>
      </div>
      <label>Select image
      </label>
      <div class="form-group">
       <input type="file" name="img[]" class="form-control" required="">
      </div>
      <div class="form-group">
      	
      </div>
      
                  <button type="submit" name="submit" class="btn btn-animate btn-animate-side btn-success">
                    <span><i class="icon wb-upload" aria-hidden="true"></i>Upload</span>
                  </button>
                
    
    </div>
    </form>	
  </div>
</div>
  <!-- End Page -->

<?php include("include/footer.php"); ?>