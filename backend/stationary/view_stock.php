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
                <h4>Size And stock</h4>
                <p><?php echo $row_product['product_name']; ?></p>
                <?php
                if (isset($_GET['msg'])) {
                    $msg = $_GET['msg'];
                    if ($msg == 1) {
                        print '<div class="alert dark alert-icon alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
            </button>
              <i class="icon wb-check" aria-hidden="true"></i>Stock inserted successfully.
          </div>';
                    }

                }
                ?>

            </div>
            <div class="col-md-9">
                <div class="panel-body">
                    <table id="editable_table" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th  style="display:none; ">id<i class="table-dragger-handle"></i></th>
                            <th>Size Name</th>
                            <th>Stock</th>
                            <th>Price</th>
                            <th>Discount Price</th>
                            <th>Total price</th>



                        </tr>
                        </thead>
                        <tbody>
                        <?php

                            $sql_size="SELECT `stock`.`id` as s_id ,`stock`.`stock` as s_stock, `stock`.`price` as s_price,`stock`.`discount_price` as s_dis,`stock`.`main_price` as s_main_price, `size`.`name` as s_name FROM `stock` INNER JOIN `size` ON `stock`.`size_id`=`size`.`id` WHERE `stock`.`product_id`=$id";
                            if($result_size=mysqli_query($connection,$sql_size)){
                                while($row_size=mysqli_fetch_assoc($result_size)){
                        ?>

                        <tr>
                            <td style="display: none"><?php echo $row_size['s_id'];?></td>
                            <td><?php echo $row_size['s_name']; ?></td>
                            <td><?php echo $row_size['s_stock']; ?></td>
                            <td><?php echo $row_size['s_price']; ?></td>
                            <td><?php echo $row_size['s_dis']; ?></td>
                            <td><?php echo $row_size['s_main_price']; ?></td>


                        </tr>
                        <?php

                                }
                            }

                        ?>

                        </tbody>

                    </table>

                    <a href="view_product.php" class="btn btn-warning">Back</a>
                    <a href="add_stock.php?id=<?php echo $id; ?>" class="btn btn-primary">Add stock</a>
                </div>
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
<script>

    $(document).ready(function(){
        $('#editable_table').Tabledit({
            url:'php/product/update_stock.php',
            columns:{
                identifier:[0, "id"],
                editable:[[2, 's_stock'],[3, 's_price'],[4, 's_dis']]
            },
            restoreButton:false,
            onSuccess:function(data, textStatus, jqXHR)
            {
                if(data.action == 'delete')
                {
                    $('#'+data.id).remove();
                }
            }
        });

    });

</script>
