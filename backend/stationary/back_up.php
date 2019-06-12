<?php
include("include/header.php");
include("include/db.php");

?>
<!-- Page -->
<div class="page">
    <div class="page-content" style="margin-top: -21px;">
        <div class="container">

            <div class="col-md-6">
                <h4>Products</h4>

                <form action="php/categories/add_categories.php" method="post">
                    <div class="form-group">
                        <input type="text" name="main_cat" class="form-control" placeholder="Search" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Search</button>
                </form>
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
                            <th class="sindu_handle">Delete<i class="table-dragger-handle"></i></th>

                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                            <td></td>
                            <td></td>
                            <td><a href="add_sub_categories.php?id" class="btn btn-primary">Add</a></td>
                            <td><a href="edit_categories.php?id=" class="btn btn-primary"><i class="icon wb-pencil" aria-hidden="true"></i></a></td>
                            <td><a href="php/categories/delete_categories.php?id" onclick="return confirm('Are you sure you want to delete this item?')" style="padding-top: 9px;" class="btn  btn-danger "><i class="icon wb-trash" aria-hidden="true"></i></a></td>
                        </tr>

                        </tbody>

                    </table>
                    <nav>
                        <ul class="pagination">
                            <li class="disabled page-item">
                                <a class="page-link" href="javascript:void(0)" aria-label="Previous">
                                    <span aria-hidden="true">«</span>
                                </a>
                            </li>
                            <li class="active page-item"><a class="page-link" href="javascript:void(0)">1 <span class="sr-only">(current)</span></a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0)">4</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0)">5</a></li>
                            <li class="page-item">
                                <a class="page-link" href="javascript:void(0)" aria-label="Next">
                                    <span aria-hidden="true">»</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
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
