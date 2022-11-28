<?php
include_once '../config/connect.php';
$sql = "DELETE FROM product WHERE id='" . $_GET["product_id"] . "'";
if (mysqli_query($connect, $sql)) {
    echo "Record deleted successfully";
    header( "refresh:2;url=../index.php" );
} else {
    echo "Error deleting record: " . mysqli_error($connect);
}
mysqli_close($connect);
?>