<?php 
include_once '../config/connect.php';
if(isset($_POST["submit"]))
{
    $name = $_POST['name'];
    $img = $_POST['img'];
    $category_id = $_POST['category_id'];
    $status = $_POST['status'];
    $price = $_POST['price'];
    $sale_price = $_POST['sale'];
    $content = $_POST['content'];
    $query = "INSERT INTO product VALUES('','$name','$img','$status','$price','$sale','$category_id','$content','')";
    mysqli_query($connect,$query);
    echo "Product Added successfully";
    header( "refresh:2;url=../index.php" );
}

?>