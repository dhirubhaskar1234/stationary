<?php 
	include("include/header.php");
	include("include/db.php"); 
?>
  <!-- Page -->
  <div class="page">
    <div class="page-content" style="margin-top: -21px;">
     	<div class="container">
            <h4>Add Product</h4>
            <?php
            if (isset($_GET['msg'])) {
                $msg = $_GET['msg'];
                if ($msg == 1) {
                    print '<div class="alert dark alert-icon alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
            </button>
              <i class="icon wb-check" aria-hidden="true"></i>Product inserted successfully <a href="" >View product</a> .
          </div>';
                }
                if ($msg == 2) {
                    print '<div class="alert dark alert-icon alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
            </button>
              <i class="icon wb-check" aria-hidden="true"></i>Image file should be jpg jpeg or png.
          </div>';
                }
                if ($msg == 3) {
                    print '<div class="alert dark alert-icon alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
            </button>
              <i class="icon wb-check" aria-hidden="true"></i>Amount value should be numeric.
          </div>';
                }
            }
            ?>
            <form action="php/product/add_product.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">

                    <label>Product name</label>
                    <div class="form-group">
                        <input type="text" name="product_name" class="form-control" required>
                    </div>
                    <label>Product code</label>
                    <div class="form-group">
                        <input type="text" name="product_code" class="form-control" required>
                    </div>
                    <label>Categories</label>
                    <div class="form-group">
                        <select id="main_cat" name="main_cat" class="form-control" required>
                            <option>Select categories</option>
                            <?php
                            $sql_cat="SELECT * FROM `categories` WHERE `parrent_id`=1";
                            if($result_cat=mysqli_query($connection,$sql_cat)){
                                while ($row_cat=mysqli_fetch_assoc($result_cat)){
                            ?>
                                    <option value="<?php echo $row_cat['id']; ?>"><?php echo $row_cat['cat_name']; ?></option>
                            <?php
                                }
                            }


                            ?>
                        </select>
                    </div>
                    <label>Sub Categories</label>
                    <div class="form-group">
                        <select id="sub_cat" name="sub_cat" class="form-control" required>
                            <option>Select Sub categories</option>
                        </select>
                    </div>
                    <label>Brand</label>
                    <div class="form-group">
                        <select  name="brand" class="form-control">
                            <option value="">Select Brand</option>
                            <?php
                                $sql_brand="SELECT * FROM `brand`";
                                if ($result_brand=mysqli_query($connection,$sql_brand)){
                                    while($row_brand=mysqli_fetch_assoc($result_brand)){
                            ?>
                                        <option value="<?php echo $row_brand['id']; ?>"><?php echo $row_brand['name']; ?></option>
                            <?php
                                    }
                                }



                            ?>
                        </select>
                    </div>
                    <label>Product Description</label>
                    <div class="form-group">
                        <textarea id="editor2" name="product_description" class="form-control" required></textarea>
                    </div>
                    <label>Image</label>
                    <div class="form-group">
                       <input type="file" class="form-control" name="img[]" multiple required>
                    </div>
                    <label>Minimum Order</label>
                    <div class="form-group">
                        <input type="number" name="min_order" class="form-control" required>

                    </div>
                    <label>Gst(percentage)</label>
                    <div class="form-group">
                        <input type="number" name="gst" class="form-control" required>

                    </div>
                    <button type="submit" name="submit" class="btn btn-success">Save product</button>

                </div>
                <div class="col-md-6">
                    <div id="dynamic_field">
                    <div>

                    <label for="">Size name</label>
                    <div class="form-group" id="size_id">
                        <select name="size_name[]" class="form-control" required >
                            <option value="">Select size</option>
                            <?php
                            $sql_size="SELECT * FROM `size`";
                            if($result_size=mysqli_query($connection,$sql_size)){
                                while ($row_size=mysqli_fetch_assoc($result_size)){
                            ?>
                                    <option value="<?php echo $row_size['id']; ?>"><?php echo $row_size['name']; ?></option>
                            <?php }} ?>

                        </select>
                    </div>
                    <label for="">Stock</label>
                    <div class="form-group">
                        <input type="number" class="form-control" min="1" name="size_stock[]"  placeholder="" required>
                    </div>
                    <label for="">Price</label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="size_price[]" placeholder="" required>
                    </div>
                    <label for="">Discount Price</label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="size_discount[]" placeholder="">
                    </div>

                    <button type="button" name="add" id="add" class="btn btn-success">Add More</button>
                    </div>
                    </div>
                </div>

            </div>
            </form>

        </div>
    </div>
  </div>
  <!-- End Page -->

<?php include("include/footer.php"); ?>

<script>
    CKEDITOR.replace('editor2');
</script>
<script>
    $(document).ready(function(){
        var i=1;
        var size=$('#size_id').html();
        $('#add').click(function(){
            i++;
            $('#dynamic_field').append('<div id="row'+i+'"><label for="">Size name</label><div class="form-group">'+size+'</div> <label for="">Stock</label><div class="form-group"><input type="number" class="form-control" name="size_stock[]"  placeholder=""></div><label for="">Price</label> <div class="form-group"><input type="text" class="form-control" name="size_price[]" placeholder=""> </div><label for="">Discount Price</label><div class="form-group"><input type="text" class="form-control" name="size_discount[]" placeholder=""></div> <button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">Remove</button></div>');
        });
        $(document).on('click', '.btn_remove', function(){
            var button_id = $(this).attr("id");
            $('#row'+button_id+'').remove();
        });

    });
</script>

<script >
    $(document).ready(function(){
        $('#main_cat').change(function(){

            var main_cat_id =$(this).val();
            //alert(main_cat_id);

            $.ajax({
                url:'php/ajax/fetch_sub_cat.php',
                method:'POST',
                data : { foo : main_cat_id},
                // dataType:'text',
                success:function(data){
                    console.log(data);
                    $('#sub_cat').html(data);
                }
            });

        });
    });

</script>
