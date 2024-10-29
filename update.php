<?php

include 'connection.php';

if (isset($_POST['submit'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];  
    $category = $_POST['category'];
    $buying_price = $_POST['buying_price'];
    $selling_price = $_POST['selling_price'];
    $stock_quantity = $_POST['stock_quantity'];

    $updateQuery = "UPDATE `products` SET 
        `product_name` = '$product_name',  
        `category` = '$category', 
        `buying_price` = '$buying_price',  
        `selling_price` = '$selling_price', 
        `stock_quantity` = '$stock_quantity'
        WHERE `product_id` = $product_id";

    $result = mysqli_query($conn, $updateQuery);

    if ($result) {

        header('Location: products.php');
        exit(); 
    } else {

        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>
