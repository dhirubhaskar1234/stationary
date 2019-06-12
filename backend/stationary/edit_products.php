<?php
include("include/header.php");
include("include/db.php");
function mysql_entities_fix_string($string){
    return htmlentities(mysql_fix_string($string));
}
function mysql_fix_string($string){
    if (get_magic_quotes_gpc())
        $string = stripslashes($string);
    return $string;
}
function clean($variable)
{
    global $connection;
    $variable = mysqli_real_escape_string($connection,mysql_entities_fix_string($variable));
    return $variable;
}
if (isset($_GET['id'])){
    $id=clean($_GET['id']);
}
$sql_product="SELECT * FROM `products` WHERE `id`=$id";
if($result_product=mysqli_query($connection,$sql_product)){
    $row_product=mysqli_fetch_assoc($result_product);
}
?>
<!-- Page -->
<div class="page">
    <div class="page-content" style="margin-top: -21px;">
        <div class="container">

            <div class="col-md-6">
                <h4>Edit Products</h4>
                <p><?php echo $row_product['product_name']; ?></p>

                <form action="php/product/edit_products.php" method="post" enctype="multipart/form-data">
                    <label>Product Name</label>
                    <div class="form-group">
                        <input type="text" name="product_name" class="form-control" value="<?php echo $row_product['product_name']; ?>">
                    </div>
                    <label>Product Code</label>
                    <div class="form-group">
                        <input type="text" name="product_code" class="form-control" value="<?php echo $row_product['product_code'] ?>">
                    </div>
                    <label>Product Description</label>
                    <div class="form-group">
                        <textarea class="form-control" name="product_description" id="editor2"><?php echo $row_product['product_description'] ?></textarea>
                    </div>
                    <label>Thumbnail</label>
                    <div class="form-group">
                        <input type="file" class="form-control" name="img">
                    </div>
                    <?php
                        if (isset($_GET['msg'])){
                            $msg=$_GET['msg'];
                            if ($msg==2){
                                print " <small style='color: red'>Image format should be jpg png or jpeg</small>";
                            }
                        }


                    ?>

                    <div>
                        <img width="40%" style="margin-bottom:10px; " src="uploads/<?php echo $row_product['image']; ?>">
                    </div>
                    <input type="hidden" name="id"  value="<?php echo $row_product['id']; ?>">
                    <label>Minimum Order</label>
                    <div class="form-group">
                        <input type="number" name="min_order" class="form-control" value="<?php echo $row_product['min_order']; ?>" required>

                    </div>
                    <label>Gst(percentage)</label>
                    <div class="form-group">
                        <input type="number" name="gst" class="form-control" value="<?php echo $row_product['gst']; ?>" required>

                    </div>

                    <button type="submit" name="submit" class="btn btn-primary">Save</button>
                </form>
            </div>



        </div>
    </div>
</div>
<!-- End Page -->

<?php include("include/footer.php"); ?>

<script>
    CKEDITOR.replace('editor2');
</script>
