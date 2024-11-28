<?php

include __DIR__ . '/../db/dbcon.php'; // Include the database connection
// Check if the user is logged in as a seller (you can adapt this for your login system)
if (!isset($_SESSION['user_id'])) {
    echo "Please log in to access this page.";
    exit;
}

// Process form submission to add a new product
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_product'])) {
    $product_name = $_POST['product_name'];
    $product_description = $_POST['product_description'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];  // Assume the seller provides a URL or path for the image
    $product_stock = $_POST['product_stock'];
    $product_category = $_POST['product_category'];  // New field for category

    // Insert product into the database
    $stmt = $conn->prepare("INSERT INTO Products (ProductName, ProductDescription, ProductPrice, ProductImage, ProductStock, ProductCategory) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$product_name, $product_description, $product_price, $product_image, $product_stock, $product_category]);

    echo "Product added successfully!";
}

// Fetch all products from the database, including category names
$stmt = $conn->prepare("SELECT p.*, l.LookupName AS CategoryName FROM Products p 
                        JOIN lookup l ON p.ProductCategory = l.LookUpId");
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center">Seller Dashboard</h2>
        <hr>

        <!-- Add Product Form -->
        <h3>Add New Product</h3>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="product_name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="product_name" name="product_name" required>
            </div>

            <div class="mb-3">
                <label for="product_description" class="form-label">Product Description</label>
                <textarea class="form-control" id="product_description" name="product_description" rows="3"
                    required></textarea>
            </div>

            <div class="mb-3">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="number" class="form-control" id="product_price" name="product_price" step="0.01" required>
            </div>

            <div class="mb-3">
                <label for="product_image" class="form-label">Product Image URL</label>
                <input type="text" class="form-control" id="product_image" name="product_image" required>
            </div>

            <div class="mb-3">
                <label for="product_stock" class="form-label">Product Stock</label>
                <input type="number" class="form-control" id="product_stock" name="product_stock" required>
            </div>

            <!-- Product Category Dropdown -->
            <div class="mb-3">
                <label for="product_category" class="form-label">Product Category</label>
                <select class="form-select" id="product_category" name="product_category" required>
                    <option value="3">Food</option>
                    <option value="4">Drinks</option>
                    <option value="5">Cake</option>
                </select>
            </div>

            <button type="submit" name="add_product" class="btn btn-primary">Add Product</button>
        </form>

        <hr>

        <!-- Display Products Table -->
        <h3 class="mt-5">Existing Products</h3>
        <div class="mb-3">
            <label for="filter_category" class="form-label">Filter by Category</label>
            <select class="form-select" id="filter_category" name="filter_category">
                <option value="">All</option>
                <option value="Food">Food</option>
                <option value="Drinks">Drinks</option>
                <option value="Cake">Cake</option>
            </select>
        </div>

        <table class="table table-bordered" id="product_table">
            <thead>
                <tr>
                    <th scope="col">Product Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Image</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Category</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Display products from the database, now including the category name
                foreach ($products as $product) {
                    echo '
                    <tr class="product" data-category="' . htmlspecialchars($product['CategoryName']) . '">
                        <td>' . htmlspecialchars($product['ProductName']) . '</td>
                        <td>' . htmlspecialchars($product['ProductDescription']) . '</td>
                        <td>$' . number_format($product['ProductPrice'], 2) . '</td>
                        <td><img src="' . htmlspecialchars($product['ProductImage']) . '" alt="Product Image" width="100"></td>
                        <td>' . $product['ProductStock'] . '</td>
                        <td>' . htmlspecialchars($product['CategoryName']) . '</td>
                    </tr>';
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    // Filter products by category
    document.getElementById('filter_category').addEventListener('change', function() {
        let category = this.value;
        let rows = document.querySelectorAll('.product');

        rows.forEach(row => {
            let productCategory = row.getAttribute('data-category');
            if (category === '' || productCategory === category) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
    </script>
</body>

</html>