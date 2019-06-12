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
                <h4>Stock</h4>
                <p><?php echo $row_product['product_name']; ?></p>
            </div>
            <form action="php/product/add_stock.php" method="post">
            <div class="col-md-9">
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
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <button type="submit" class="btn btn-primary" style="margin-top: 23px;" name="submit">Save</button>
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
