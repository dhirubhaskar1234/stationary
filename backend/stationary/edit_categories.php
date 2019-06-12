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
    $cat_id=clean($_GET['id']);
    $sql_cat_name="SELECT * FROM `categories` WHERE `id`=$cat_id";
    if($result_cat_name=mysqli_query($connection,$sql_cat_name)){
        $row_name=mysqli_fetch_assoc($result_cat_name);
    }

}
?>
<!-- Page -->
<div class="page">
    <div class="page-content" style="margin-top: -21px;">
        <div class="container">

            <div class="col-md-6">
                <?php
                if (isset($row_name['cat_name'])){
                    print '<h4>Edit Categories('.$row_name['cat_name'].')</h4>';
                }

                ?>


                <?php
                if (isset($_GET['msg'])) {
                    $msg = $_GET['msg'];
                    if ($msg == 1) {
                        print '<div class="alert dark alert-icon alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
            </button>
              <i class="icon wb-check" aria-hidden="true"></i>Category added successfully.
          </div>';
                    }
                }
                ?>
                <form action="php/categories/edit_categories.php" method="post">
                    <div class="form-group">
                        <input type="text" name="main_cat" class="form-control" placeholder="Enter category name" value="<?php echo $row_name['cat_name']; ?>" required>
                        <input type="hidden" name="main_cat_id" value="<?php echo $cat_id; ?>">
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
<script>
    $(document).ready(function(){
        var i=1;
        $('#add').click(function(){
            i++;
            $('#dynamic_field').append('<div id="row'+i+'"><label for="">Size name</label><div class="form-group"><input type="text" class="form-control" name="size_name[]" placeholder=""></div> <label for="">Stock</label><div class="form-group"><input type="number" class="form-control" name="size_stock[]"  placeholder=""></div><label for="">Price</label> <div class="form-group"><input type="text" class="form-control" name="size_price[]" placeholder=""> </div><label for="">Discount Price</label><div class="form-group"><input type="text" class="form-control" name="size_discount[]" placeholder=""></div> <button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">Remove</button></div>');
        });
        $(document).on('click', '.btn_remove', function(){
            var button_id = $(this).attr("id");
            $('#row'+button_id+'').remove();
        });

    });
</script>

