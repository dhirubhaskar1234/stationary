<?php
include("include/header.php");
include("include/db.php");

?>
<!-- Page -->
<div class="page">
    <div class="page-content" style="margin-top: -21px;">
        <div class="container">

            <div class="col-md-6">
                <h4>Add Size</h4>
                <?php
                if (isset($_GET['msg'])) {
                    $msg=$_GET['msg'];
                    if ($msg==1) {
                        print '<div class="alert dark alert-icon alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
            </button>
              <i class="icon wb-check" aria-hidden="true"></i> Size added successfully.
          </div>';
                    }
                }
                ?>

                <form action="php/product/add_size.php" method="post">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Enter Size Name" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    <a href="index.php" class="btn btn-warning">Back</a>
                </form>
            </div>
            <div class="col-md-9">
                <div class="panel-body">
                    <table id="editable_table" class="table">
                        <thead>
                        <tr>
                            <th style="display:none; ">id</th>
                            <th>Size Name</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sql_brand="SELECT * FROM `size` ORDER BY `id` DESC";
                        if ($result_brand=mysqli_query($connection,$sql_brand)){
                            while($row=mysqli_fetch_assoc($result_brand)){


                                ?>
                                <tr>
                                    <td style="display: none;"><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                </tr>
                                <?php

                            }
                        }


                        ?>

                        </tbody>
                    </table>


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
            url:'php/product/update_size.php',
            columns:{
                identifier:[0, "id"],
                editable:[[1, 'name']]
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
