<?php
include("connection.php");

if (isset($_POST['submit'])) {
    $product_id = $_POST['product_id'];
    $quantity_sold = isset($_POST['quantity_sold']) ? (int)$_POST['quantity_sold'] : 0;

    if ($quantity_sold <= 0) {
        echo "<script>alert('All fields are required and must be greater than zero!'); window.location.href='add_sales.php';</script>";
        exit();
    }

    $fetchPriceQuery = "SELECT selling_price FROM products WHERE product_id = ?";
    $stmt = $conn->prepare($fetchPriceQuery);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
        $selling_price = $product['selling_price'];
        
        $total_amount = $quantity_sold * $selling_price;

        $insertQuery = "INSERT INTO `sales` (`product_id`, `quantity_sold`, `total_amount`,`date`) VALUES (?, ?, ?,?)";
        $stmt = $conn->prepare($insertQuery);

        if ($stmt === false) {
            die("Error preparing the statement: " . $conn->error);
        }

        $stmt->bind_param("iids", $product_id, $quantity_sold, $total_amount, $date);  
        $result = $stmt->execute();

        if ($result) {
            header('Location: sales.php');
            exit();
        } else {
            echo "Error Inserting: " . $stmt->error;
        }

    } else {
        echo "<script>alert('Product not found!'); window.location.href='add_sales.php';</script>";
        exit();
    }

    $stmt->close();
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Sale</title>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@unocss/reset/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@unocss/reset/tailwind.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="add.css">
    <link rel="stylesheet" href="sidebar.css">
</head>
<body>
    <header class="p-3 border-bottom">
        <div class="row">
            <div class="col-2"></div>

            <div class="col-9"></div>

            <div class="col-1 d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <div class="dropdown text-end">
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown">
                      <img src="https://www.pngmart.com/files/21/Admin-Profile-PNG-Clipart.png" alt="mdo" width="32" height="32" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                      <li><a class="dropdown-item" href="index.php">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <div class="row">
        <div class="sidebar close">
            <div class="logo-details">
                <img style="height: 50px; margin-left: 14px;" src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='1em' height='1em' viewBox='0 0 16 16'%3E%3Cpath fill='none' stroke='white' d='M2.5 10.5H5a.5.5 0 0 1 .5.5v2m8-4.5H10a.5.5 0 0 0-.5.5v4M7.83 2.562l-5 1.818a.5.5 0 0 0-.33.47V13a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V4.85a.5.5 0 0 0-.33-.47l-5-1.818a.5.5 0 0 0-.34 0Z'/%3E%3C/svg%3E" alt="">
                <span class="logo_name">Inventory System</span>
            </div>
            <ul class="nav-links">
                <li><a href="home.php"><i class='bx bx-grid-alt'></i><span class="link_name">Dashboard</span></a></li>
                <li>
                    <div class="icon-link">
                        <a href="#"><i class='bx bx-collection'></i><span class="link_name">Product</span></a>
                        <i class='bx bxs-chevron-down arrow'></i>
                    </div>
                    <ul class="sub-menu">
                        <li><a href="products.php">All Products</a></li>
                        <li><a href="add_products.php">Add Products</a></li>
                    </ul>
                </li>
                <li>
                    <div class="icon-link">
                        <a href="#"><i class='bx bx-book-alt'></i><span class="link_name">Supplier</span></a>
                        <i class='bx bxs-chevron-down arrow'></i>
                    </div>
                    <ul class="sub-menu">
                        <li><a href="suppliers.php">All Suppliers</a></li>
                        <li><a href="add_suppliers.php">Add Supplier</a></li>
                    </ul>
                </li>
                <li>
                    <div class="icon-link">
                        <a href="#"><i class='bx bx-plug'></i><span class="link_name">Sales Report</span></a>
                        <i class='bx bxs-chevron-down arrow'></i>
                    </div>
                    <ul class="sub-menu">
                        <li><a href="sales.php">All Sales</a></li>
                        <li><a href="add_sales.php">Add Sales</a></li>
                    </ul>
                </li>
            </ul>
        </div>

        <section class="home-section" style="height: 100vh; overflow: hidden;">
            <div class="row p-5" style="height: 100%;">
                <div class="col-2"></div>
                <div class="col-8">
                    <div class="container">
                        <div class="heading">Add Sale</div>

                        <form action="" method="POST" class="form">

                            <div class="input-group mb-3 flex-grow-1">
                                <span class="input-group-text" id="basic-addon1">📦</span>
                                <select name="product_id" class="form-select" required>
                                    <option value="" disabled selected>Select a Product</option>
                                    <?php
                                        include("connection.php");
                                        $product_name = mysqli_query($conn,"SELECT * FROM products");
                                        while ($row = mysqli_fetch_array($product_name)) {
                                    ?>
                                    <option value="<?php echo $row['product_id'] ?>"><?php echo $row['product_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="d-flex p-3">
                                <div class="input-group mb-3 mx-1">
                                    <span class="input-group-text">🛒</span>
                                    <input type="number" name="quantity_sold" class="form-control" aria-label="Quantity Sold" placeholder="Quantity Sold" required>
                                </div>
                            </div>
                            
                            <button style="margin-left: 80%;" type="submit" name="submit" class="login-button">Add Product</button>
   
                            </form>
                            
                            <div class="col">
                            <a href="sales.php">
                                <button type="button" class="btn btn-secondary">Cancel</button>
                            </a>

                            </div>
                    </div>
                </div>
                <div class="col-2"></div>
            </div>
        </section>
    </div>

    <script>
        let sidebar = document.querySelector(".sidebar");

        sidebar.addEventListener("mouseover", () => {
            sidebar.classList.remove("close");
        });
        sidebar.addEventListener("mouseout", () => {
            sidebar.classList.add("close");
        });

        let arrow = document.querySelectorAll(".arrow");
        for (var i = 0; i < arrow.length; i++) {
            arrow[i].addEventListener("mouseover", (e) => {
                let arrowParent = e.target.parentElement.parentElement; 
                arrowParent.classList.toggle("showMenu");
            });
        }
    </script>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
