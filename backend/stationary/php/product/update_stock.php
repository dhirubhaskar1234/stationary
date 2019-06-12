<?php
//action.php
include("../../include/db.php");

$input = filter_input_array(INPUT_POST);


$stock = mysqli_real_escape_string($connection, $input["s_stock"]);
$price = mysqli_real_escape_string($connection, $input["s_price"]);
$discount_price = mysqli_real_escape_string($connection, $input["s_dis"]);
$main_price=$price-$discount_price;


if($input["action"] === 'edit')
{
    $query = "UPDATE `stock` SET `stock`='$stock',`price`='$price',`discount_price`='$discount_price',`main_price`='$main_price' WHERE `id`='".$input["id"]."'";

    mysqli_query($connection, $query);

}
if($input["action"] === 'delete')
{
    $query = "DELETE FROM `stock` WHERE `id`='".$input["id"]."'";
    mysqli_query($connection, $query);
}

echo json_encode($input);

?>
