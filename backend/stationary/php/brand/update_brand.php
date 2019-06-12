<?php
//action.php
include("../../include/db.php");

$input = filter_input_array(INPUT_POST);

$name = mysqli_real_escape_string($connection, $input["name"]);



if($input["action"] === 'edit')
{
    $query = "UPDATE `brand` SET `name`='$name' WHERE `id`='".$input["id"]."'";

    mysqli_query($connection, $query);

}
if($input["action"] === 'delete')
{
    $query = "DELETE FROM `brand` WHERE `id`='".$input["id"]."'";
    mysqli_query($connection, $query);
}

echo json_encode($input);

?>
