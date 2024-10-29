    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>All Sales</title>
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@unocss/reset/normalize.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@unocss/reset/tailwind.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
                        <h1>All Sales</h1>
                    </div>

                    <div class=" d-flex" style="width: 20%; margin-left: 35%;">
                        <!-- Search Bar -->
                        <form action="" method="GET" id="searchForm">
                            <input style="width: 500px; margin-right: 40px;"
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
                            <a href="add_sales.php">
                            <button style="width: 150px;">
                                <svg aria-hidden="true" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-width="2" stroke="#fffffff" d="M13.5 3H12H8C6.34315 3 5 4.34315 5 6V18C5 19.6569 6.34315 21 8 21H11M13.5 3L19 8.625M13.5 3V7.625C13.5 8.17728 13.9477 8.625 14.5 8.625H19M19 8.625V11.8125" stroke-linejoin="round" stroke-linecap="round"></path>
                                    <path stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="#fffffff" d="M17 15V18M17 21V18M17 18H14M17 18H20"></path>
                                </svg>
                                ADD SALE
                            </button>
                            </a>
                        </div>
                    </div>

                    <div class="scrollable-table" style="overflow-y: auto; height: calc(100vh - 200px);"> 
                    <table id="example" class="table table-striped table-bordered table-hover my-5" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Selling Price</th>
                                <th>Quantity Sold</th>
                                <th>Total Amount</th>
                                <th>CreatedAt</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            include 'connection.php'; 

                            $baseQuery = "SELECT p.product_id, p.product_name, p.category, p.selling_price, s.quantity_sold, 
                            s.total_amount, s.date FROM products p 
                            LEFT JOIN sales s ON p.product_id = s.product_id 
                            WHERE s.quantity_sold > 0 AND s.total_amount > 0"; 
      

                            if (isset($_GET['search'])) {
                                $filtervalues = $_GET['search'];
                                
                                $query = $baseQuery . " AND CONCAT(p.product_name, p.category, s.quantity_sold, s.total_amount, s.date) LIKE '%$filtervalues%'";
                            } else {
                                
                                $query = $baseQuery;
                            }
                            

                            $result = mysqli_query($conn, $query);
                            if (mysqli_num_rows($result) > 0) {
                                foreach ($result as $sale) { ?>
                                    <tr>
                                        <td><?php echo $sale['product_id']; ?></td>
                                        <td><?php echo $sale['product_name']; ?></td>
                                        <td><?php echo $sale['category']; ?></td>
                                        <td><?php echo number_format($sale['selling_price'], 2); ?></td>
                                        <td><?php echo $sale['quantity_sold']; ?></td>
                                        <td><?php echo number_format($sale['total_amount'], 2); ?></td>
                                        <td><?php echo $sale['date']; ?></td>
                                    </tr>
                                <?php }
                            } else {
                                echo "<tr><td colspan='8' style='text-align:center;'>No records found</td></tr>";
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>

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

    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    </body>
    </html>
