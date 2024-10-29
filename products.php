<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products</title>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@unocss/reset/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@unocss/reset/tailwind.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="search.css">
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
        <div class="container mx-5">
            <h1>All Products</h1>
        </div>

        <div class=" d-flex" style="width: 20%; margin-left: 35%;">
            <!-- Search Bar -->
            <form action="" method="GET" id="searchForm">
                <input style="width: 500px; margin-right: 25px;"
                    type="text" 
                    name="search" 
                    placeholder="Search" 
                    value="<?php if (isset($_GET['search'])) { echo $_GET['search']; } ?>" 
                    class="form-control form-control-lg"
                    id="Input"
                    onkeyup="searchFunction()" 
                >
            </form> 

            <div class="col-3 mx-2">
                <a href="add_products.php">
                    <button style="width: 170px;">
                        <svg aria-hidden="true" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-width="2" stroke="#fffffff" d="M13.5 3H12H8C6.34315 3 5 4.34315 5 6V18C5 19.6569 6.34315 21 8 21H11M13.5 3L19 8.625M13.5 3V7.625C13.5 8.17728 13.9477 8.625 14.5 8.625H19M19 8.625V11.8125" stroke-linejoin="round" stroke-linecap="round"></path>
                            <path stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="#fffffff" d="M17 15V18M17 21V18M17 18H14M17 18H20"></path>
                        </svg>
                        ADD PRODUCT
                    </button>
                </a>
            </div>
        </div>


        <div class="scrollable-table" style="overflow-y: auto; height: calc(100vh - 200px);"> 
            <table id="example" class="table table-striped table-bordered table-hover my-5" cellspacing="0" width="100%" >
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Buying Price (₱)</th>
                        <th>Selling Price (₱)</th>
                        <th>Stock Quantity</th>
                        <th>Supplier</th>
                        <th style="text-align:center;width:100px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include 'connection.php'; 

                        if (isset($_GET['search'])) {
                            $filtervalues = $_GET['search'];

                            $query = "
                                SELECT p.*, s.supplier_name 
                                FROM products p
                                JOIN suppliers s ON p.supplier_id = s.supplier_id
                                WHERE CONCAT(p.product_name, p.category, p.buying_price, p.selling_price, p.stock_quantity, s.supplier_name) LIKE '%$filtervalues%'
                            ";
                        } else {
                            $query = "
                                SELECT p.*, s.supplier_name 
                                FROM products p
                                JOIN suppliers s ON p.supplier_id = s.supplier_id
                            ";
                        }

                        $result = mysqli_query($conn, $query);

                        if (mysqli_num_rows($result) > 0) {
                            foreach ($result as $product) { ?>
                                <tr style="text-align: center;">
                                    <td><?= $product['product_id']; ?></td>
                                    <td><?= $product['product_name']; ?></td>
                                    <td><?= $product['category']; ?></td>
                                    <td><?= $product['buying_price']; ?></td>
                                    <td><?= $product['selling_price']; ?></td>
                                    <td><?= $product['stock_quantity']; ?></td>
                                    <td><?= $product['supplier_name']; ?></td>
                                    <td style="display:flex;">
                                        <a href="delete.php?product_id=<?= $product['product_id'] ?>" 
                                        onclick="return confirm('Are you sure you want to delete this product?')" 
                                        class="btn btn-outline-danger">
                                        Delete
                                        </a>
                                        <a href="updateform.php?product_id=<?= $product['product_id'] ?>" 
                                        class="btn btn-outline-info">
                                        Update
                                        </a>
                                    </td>
                                </tr>
                            <?php }
                        } else {
                            echo "<tr><td colspan='8' style='text-align:center;'>No records found</td></tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

    <!-- JS for the sidebar hover -->
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

    <script>
            function searchFunction() {
                let input = document.getElementById("input");
                let filter = input.value.toLowerCase();
                let table = document.getElementById("supplierTable");
                let tr = table.getElementsByTagName("tr");

                for (let i = 1; i < tr.length; i++) {
                    let td = tr[i].getElementsByTagName("td");
                    let found = false;
                    for (let j = 0; j < td.length; j++) {
                        if (td[j]) {
                            if (td[j].innerHTML.toLowerCase().indexOf(filter) > -1) {
                                found = true;
                                break;
                            }
                        }
                    }
                    tr[i].style.display = found ? "" : "none";
                }
            }
        </script>

    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
