<?php
include 'connection.php';

if (isset($_GET['supplier_id'])) {
    $supplier_id = $_GET['supplier_id'];

    $deleteQuery = "DELETE FROM `suppliers` WHERE `supplier_id` = '$supplier_id'";
    $result = mysqli_query($conn, $deleteQuery);

    if ($result) {

        header('Location: suppliers.php');
        exit();
    } else {

        echo "Error Deleting Supplier: " . mysqli_error($conn);
    }
} else {

    header('Location: suppliers.php');
    exit();
}
?>

