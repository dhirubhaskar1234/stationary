<?php
include("include/header.php");
include("include/db.php");
if (isset($_GET['page'])) {


    $page=$_GET['page'];

}else{

    $page=1;
}

if($page=='' || $page==1){

    $page_1=0;
}else{

    $page_1=($page * 10)-10;


}

?>
<!-- Page -->
<div class="page">
    <div class="page-content" style="margin-top: -21px;">
        <div class="container">

            <div class="col-md-6">
                <h4>Products</h4>
                <?php
                if (isset($_GET['msg'])) {
                    $msg = $_GET['msg'];
                    if ($msg == 1) {
                        print '<div class="alert dark alert-icon alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
            </button>
              <i class="icon wb-check" aria-hidden="true"></i>Product updated successfully.
          </div>';
                    }
                    if ($msg == 5) {
                        print '<div class="alert dark alert-icon alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
            </button>
              <i class="icon wb-check" aria-hidden="true"></i>Product deleted successfully.
          </div>';
                    }
                }
                ?>

                <form action="search_product.php" method="post">
                    <div class="form-group">
                        <input type="text" name="search" class="form-control" placeholder="Search" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
            <div class="col-md-12">
                <div class="panel-body">
                    <table id="default-table" class="table table-striped sindu_origin_table">
                        <thead>
                        <tr>


                            <th class="sindu_handle">Product Name<i class="table-dragger-handle"></i></th>
                            <th style="width: 136px;" class="sindu_handle">Product Image<i class="table-dragger-handle"></i></th>
                            <th class="sindu_handle">Product Code<i class="table-dragger-handle"></i></th>
                            <th class="sindu_handle">Category<i class="table-dragger-handle"></i></th>
                            <th class="sindu_handle">Sub Category<i class="table-dragger-handle"></i></th>
                            <th class="sindu_handle">View Stock<i class="table-dragger-handle"></i></th>
                            <th class="sindu_handle">Published/Draft<i class="table-dragger-handle"></i></th>
                            <th class="sindu_handle">Edit<i class="table-dragger-handle"></i></th>
                            <th class="sindu_handle">Delete<i class="table-dragger-handle"></i></th>


                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i=1;
                            $sql_product="SELECT * FROM `products` ORDER BY `id` DESC LIMIT $page_1,10";

                            if ($result_product=mysqli_query($connection,$sql_product)) {
                                while ($row_product = mysqli_fetch_assoc($result_product)) {
                                    $sql_cat_main = "SELECT * FROM `categories` WHERE `id`='$row_product[main_cat]'";

                                    if ($result_cat_main = mysqli_query($connection, $sql_cat_main)) {
                                        while ($row_cat_main = mysqli_fetch_assoc($result_cat_main)) {
                                            $sql_cat_sub = "SELECT * FROM `categories` WHERE `id`='$row_product[sub_cat]'";

                                            if ($result_cat_sub = mysqli_query($connection, $sql_cat_sub)) {
                                                while ($row_cat_sub = mysqli_fetch_assoc($result_cat_sub)) {


                                                    ?>

                                                    <tr>

                                                        <td><?php echo $row_product['product_name']; ?></td>
                                                        <td><img width="58%" src="uploads/<?php echo $row_product['image']; ?>"</td>
                                                        <td><?php echo $row_product['product_code']; ?></td>
                                                        <td><?php echo $row_cat_main['cat_name']; ?></td>
                                                        <td><?php echo $row_cat_sub['cat_name']; ?></td>


                                                        <td><a href="view_stock.php?id=<?php echo $row_product['id']; ?>" class="btn btn-primary">View</a>
                                                        </td>
                                                        <?php
                                                            if ($row_product['active']==0){
                                                                print '<td><a href="php/product/published_product.php?id='.$row_product['id'].'&status=draft" class="btn btn-warning">Draft</a> </td>';
                                                            }elseif($row_product['active']){
                                                                print '<td><a href="php/product/published_product.php?id='.$row_product['id'].'&status=published" class="btn btn-primary">Published</a> </td>';
                                                            }

                                                        ?>

                                                        <td><a href="edit_products.php?id=<?php echo $row_product['id']; ?>" class="btn btn-primary"><i
                                                                    class="icon wb-pencil" aria-hidden="true"></i></a>
                                                        </td>
                                                        <td><a href="php/product/delete_products.php?id=<?php echo $row_product['id']; ?>"
                                                               onclick="return confirm('Are you sure you want to delete this item?')"
                                                               style="padding-top: 9px;" class="btn  btn-danger "><i
                                                                    class="icon wb-trash" aria-hidden="true"></i></a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    $i++;
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                            ?>

                        </tbody>

                    </table>
                    <?php
                        $sql_pag="SELECT * FROM `products`";
                        $result_pag=mysqli_query($connection,$sql_pag);
                        $count=mysqli_num_rows($result_pag);
                        $count_page=ceil($count/10);



                    ?>
                    <nav>
                        <ul class="pagination">

                            <?php
                                for ($i=1; $i <= $count_page; $i++) {
                                    if ($page == $i) {
                                        print ' <li class="active page-item"><a class="page-link" href="view_product.php?page=' . $i . '">' . $i . '</a></li>';
                                    } else {
                                        print ' <li class=" page-item"><a class="page-link" href="view_product.php?page='.$i.'">'.$i.'</a></li>';

                                    }
                                }


                            ?>


                        </ul>
                    </nav>
                    <a href="index.php" class="btn btn-warning">Back</a>
                    <a href="add_product.php" class="btn btn-primary">Add Product</a>
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
