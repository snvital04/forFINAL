<?php
session_start();
include __DIR__ . '/../db/dbcon.php'; // Include the database connection

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "Please log in to add items to your cart.";
    exit;
}

$user_id = $_SESSION['user_id']; // Get the logged-in user's ID

// Check if the form is submitted via AJAX (if POST request is made)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ensure the necessary POST data is received
    if (!isset($_POST['product_id']) || !isset($_POST['product_name']) || !isset($_POST['product_price']) || !isset($_POST['quantity'])) {
        echo "Missing product data. Please check your form.";
        exit;
    }

    // Get the product details from the form (via POST)
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $quantity = $_POST['quantity']; // Quantity selected by user

    // Check if the product already exists in the cart for the user
    $stmt = $conn->prepare("SELECT * FROM Cart WHERE UserId = ? AND ProductId = ?");
    $stmt->execute([$user_id, $product_id]);
    $product_in_cart = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($product_in_cart) {
        // If the product is already in the cart, update the quantity
        $new_quantity = $product_in_cart['Quantity'] + $quantity;
        $stmt_update = $conn->prepare("UPDATE Cart SET Quantity = ? WHERE CartId = ?");
        $stmt_update->execute([$new_quantity, $product_in_cart['CartId']]);
        echo "Product quantity updated in your cart.";
    } else {
        // If the product is not in the cart, insert it
        $stmt_insert = $conn->prepare("INSERT INTO Cart (UserId, ProductId, ProductName, ProductPrice, Quantity) VALUES (?, ?, ?, ?, ?)");
        $stmt_insert->execute([$user_id, $product_id, $product_name, $product_price, $quantity]);
        echo "Product added to your cart.";
    }

    exit; // End the PHP script after handling the request
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
    .card-img-top {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }
    </style>
</head>

<body>
    <?php include 'header.php'; // Include the header (user info, login state, etc.) ?>

    <section class="p-0" id="Shop">
        <div class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Drinks</h1>
                    <p class="lead fw-normal text-white-50 mb-0">With this shop homepage template</p>
                </div>
            </div>
        </div>

        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <!-- Fetch products from the database, filtering by ProductCategory = 3 (Food) -->
                <?php
                // Fetch products from the database where ProductCategory is 3 (Food)
                $stmt = $conn->prepare("SELECT * FROM Products WHERE ProductCategory = 4");
                $stmt->execute();
                $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($products as $product) {
                    echo '
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="' . $product['ProductImage'] . '" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h5 class="fw-bolder">' . htmlspecialchars($product['ProductName']) . '</h5>
                                    $' . number_format($product['ProductPrice'], 2) . '
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <button class="btn btn-outline-dark mt-auto" data-bs-toggle="modal" data-bs-target="#quantityModal" data-product-id="' . $product['ProductId'] . '" data-product-name="' . htmlspecialchars($product['ProductName']) . '" data-product-price="' . $product['ProductPrice'] . '">Add to cart</button>
                            </div>
                        </div>
                    </div>';
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Modal to select quantity -->
    <div class="modal fade" id="quantityModal" tabindex="-1" aria-labelledby="quantityModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="quantityModalLabel">Select Quantity</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="quantity-form">
                        <input type="hidden" id="modal-product-id" name="product_id">
                        <input type="hidden" id="modal-product-name" name="product_name">
                        <input type="hidden" id="modal-product-price" name="product_price">
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="number" id="quantity" name="quantity" class="form-control" value="1" min="1"
                                required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="add-to-cart-btn">Add to Cart</button>
                </div>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        // When "Add to cart" button is clicked, populate the modal with product details
        $('button[data-bs-toggle="modal"]').click(function() {
            var productId = $(this).data('product-id');
            var productName = $(this).data('product-name');
            var productPrice = $(this).data('product-price');

            $('#modal-product-id').val(productId);
            $('#modal-product-name').val(productName);
            $('#modal-product-price').val(productPrice);
        });

        // Handle the "Add to Cart" button in the modal
        $('#add-to-cart-btn').click(function() {
            var formData = $('#quantity-form')
                .serialize(); // Get form data including product and quantity
            $.ajax({
                url: '', // Current file (same file will handle the POST request)
                type: 'POST',
                data: formData,
                success: function(response) {
                    alert(response); // Show success message
                    $('#quantityModal').modal('hide'); // Close the modal
                },
                error: function() {
                    alert("Error adding product to cart.");
                }
            });
        });
    });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

    <script src="script.js"></script>
</body>

</html>