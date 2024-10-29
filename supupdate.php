<?php

include 'connection.php';

if (isset($_POST['submit'])) {
    $supplier_id = $_POST['supplier_id'];
    $supplier_name = $_POST['supplier_name'];  
    $contact = $_POST['contact'];

    $updateQuery = "UPDATE `suppliers` SET 
        `supplier_name` = '$supplier_name', 
        `contact` = '$contact'
        WHERE `supplier_id` = $supplier_id";

    

    $result = mysqli_query($conn, $updateQuery);

    if ($result) {

        header('Location: suppliers.php');
        exit(); 
    } else {
        
        echo "Error updating record: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>