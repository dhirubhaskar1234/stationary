<?php
    include("../../include/db.php");
       if (isset($_POST['foo'])){
           $id=$_POST['foo'];
           $result='';
           $query = "SELECT * FROM `categories` WHERE `sub_cat_id`=$id";
           $result_query = mysqli_query($connection, $query);
           $result .= '<option value="">Select Sub categories</option>';
           while($row = mysqli_fetch_assoc($result_query))
           {
               $result .= '<option value="'.$row["id"].'">'.$row["cat_name"].'</option>';
           }
           echo $result;
       }

?>
