<?php
include("include/header.php");
include("include/db.php");

?>
<!-- Page -->
<div class="page">
    <div class="page-content" style="margin-top: -21px;">
        <div class="container">

            <div class="col-md-6">
                <h4>Categories</h4>
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
                    if ($msg == 2) {
                        print '<div class="alert dark alert-icon alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
            </button>
              <i class="icon wb-check" aria-hidden="true"></i>Category updated successfully.
          </div>';
                    }
                    if ($msg == 3) {
                        print '<div class="alert dark alert-icon alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
            </button>
              <i class="icon wb-check" aria-hidden="true"></i>Category deleted successfully.
          </div>';
                    }
                }
                ?>
<!--                <form action="php/categories/add_categories.php" method="post">-->
<!--                    <div class="form-group">-->
<!--                        <input type="text" name="main_cat" class="form-control" placeholder="Enter category name" required>-->
<!--                    </div>-->
<!--                    <button type="submit" name="submit" class="btn btn-primary">Save</button>-->
<!--                </form>-->
            </div>
            <div class="col-md-9">
                <div class="panel-body">
                    <table id="default-table" class="table table-striped sindu_origin_table">
                        <thead>
                        <tr>

                            <th class="sindu_handle">Sl<i class="table-dragger-handle"></i></th>
                            <th class="sindu_handle">Category Name<i class="table-dragger-handle"></i></th>
                            <th class="sindu_handle">Add sub category<i class="table-dragger-handle"></i></th>
                            <th class="sindu_handle">Edit<i class="table-dragger-handle"></i></th>
<!--                            <th class="sindu_handle">Delete<i class="table-dragger-handle"></i></th>-->

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i=1;
                        $sql="SELECT * FROM `categories` WHERE `parrent_id`=1 ORDER BY `id` desc";
                        if($result=mysqli_query($connection,$sql)){
                            while ($row=mysqli_fetch_assoc($result)){

                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row['cat_name']; ?></td>
                            <td><a href="add_sub_categories.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Add</a></td>
                            <td><a href="edit_categories.php?id=<?php echo $row['id']; ?>" class="btn btn-primary"><i class="icon wb-pencil" aria-hidden="true"></i></a></td>
<!--                            <td><a href="php/categories/delete_categories.php?id=--><?php //echo $row['id']; ?><!--" onclick="return confirm('Are you sure you want to delete this item?')" style="padding-top: 9px;" class="btn  btn-danger "><i class="icon wb-trash" aria-hidden="true"></i></a></td>-->
                        </tr>
                    <?php $i++; } } ?>
                        </tbody>
                    </table>
                    <a href="index.php" class="btn btn-warning">Back</a>
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
