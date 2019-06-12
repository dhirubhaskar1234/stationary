<?php
    include ('../../backend/stationary/include/db.php');
    if (isset($_POST['foo'])){
        $id=$_POST['foo'];
        $sql="SELECT * FROM `stock` WHERE `id`=$id";
        if ($result=mysqli_query($connection,$sql)){
            $row=mysqli_fetch_assoc($result);
                $data = [
                    'stock' => $row['stock'],
                    'price' => $row['price'],
                    'discount_price' => $row['discount_price'],
                    'main_price' => $row['main_price'],

                ];
            echo json_encode($data,JSON_NUMERIC_CHECK);

        }
    }

?>