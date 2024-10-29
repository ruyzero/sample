<?php
include 'connection.php';

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    $deleteQuery = "DELETE FROM `products` WHERE `product_id` = '$product_id'";
    $result = mysqli_query($conn, $deleteQuery);

    if ($result) {

        header('Location: products.php');
        exit();
    } else {

        echo "Error Deleting Product: " . mysqli_error($conn);
    }
} else {

    header('Location: products.php');
    exit();
}
?>

