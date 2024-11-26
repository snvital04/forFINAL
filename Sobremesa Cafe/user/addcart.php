<?php
session_start();
include __DIR__ . '/../db/dbcon.php'; // Include the database connection

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "Please log in to view your cart.";
    exit;
}

$userId = $_SESSION['user_id']; // Get the user ID from session

// Handle the add-to-cart action
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['productId'])) {
    $productId = isset($_POST['productId']) ? (int)$_POST['productId'] : 0;
    $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;

    if ($productId <= 0 || $quantity <= 0) {
        echo "Invalid product or quantity.";
        exit;
    }

    // Check if the product exists in the Products table
    $stmt = $conn->prepare("SELECT * FROM Products WHERE ProductId = ?");
    $stmt->execute([$productId]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$product) {
        echo "Product not found.";
        exit;
    }

    // Check if the product is already in the user's cart
    $stmtCheck = $conn->prepare("SELECT * FROM Cart WHERE UserId = ? AND ProductId = ?");
    $stmtCheck->execute([$userId, $productId]);
    $existingItem = $stmtCheck->fetch(PDO::FETCH_ASSOC);

    if ($existingItem) {
        // If product already in cart, update the quantity
        $newQuantity = $existingItem['Quantity'] + $quantity;
        $stmtUpdate = $conn->prepare("UPDATE Cart SET Quantity = ? WHERE CartId = ?");
        $stmtUpdate->execute([$newQuantity, $existingItem['CartId']]);
        echo "Cart updated.";
    } else {
        // If the product is not in the cart, insert it
        $stmtInsert = $conn->prepare("INSERT INTO Cart (UserId, ProductId, Quantity) VALUES (?, ?, ?)");
        $stmtInsert->execute([$userId, $productId, $quantity]);
        echo "Product added to cart.";
    }
}

// Handle remove item from cart
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['removeCartId'])) {
    $cartId = isset($_POST['removeCartId']) ? (int)$_POST['removeCartId'] : 0;

    if ($cartId <= 0) {
        echo "Invalid cart item.";
        exit;
    }

    // Prepare the query to remove the item from the cart in the database
    $stmt = $conn->prepare("DELETE FROM Cart WHERE CartId = ? AND UserId = ?");
    $stmt->execute([$cartId, $userId]);

    echo "Item removed from the cart.";  // Return success message
    header("Location: addcart.php"); // Redirect to the cart page to refresh the cart view
    exit;
}

// Fetch cart items for the logged-in user
$stmtCart = $conn->prepare("SELECT c.CartId, c.Quantity, p.ProductName, p.ProductPrice, p.ProductImage FROM Cart c JOIN Products p ON c.ProductId = p.ProductId WHERE c.UserId = ?");
$stmtCart->execute([$userId]);
$cartItems = $stmtCart->fetchAll(PDO::FETCH_ASSOC);

// Calculate the total cart value
$stmtTotal = $conn->prepare("SELECT SUM(c.Quantity * p.ProductPrice) AS TotalPrice FROM Cart c JOIN Products p ON c.ProductId = p.ProductId WHERE c.UserId = ?");
$stmtTotal->execute([$userId]);
$total = $stmtTotal->fetch(PDO::FETCH_ASSOC)['TotalPrice'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Cart Page</title>
</head>

<body>
    <?php 
    include 'header.php'; // Assuming you have a header.php file for your page header
    ?>
    <section class="bg-light py-5 my-5">
        <div class="container">
            <div class="row">
                <!-- Cart -->
                <div class="col-lg-9">
                    <div class="card border shadow-0">
                        <div class="m-4">
                            <h4 class="card-title mb-4">Your shopping cart</h4>

                            <?php
                            if ($cartItems) {
                                foreach ($cartItems as $item) {
                                    $totalPrice = $item['Quantity'] * $item['ProductPrice']; // Calculate total price for each item
                                    echo '
                                    <form method="post">
                                    <div class="row gy-3 mb-4" data-cart-id="' . $item['CartId'] . '">
                                        <div class="col-lg-5">
                                            <div class="me-lg-5">
                                                <div class="d-flex">
                                                    <img src="' . $item['ProductImage'] . '" class="border rounded me-3" style="width: 96px; height: 96px;" />
                                                    <div class="">
                                                        <a href="#" class="nav-link">' . $item['ProductName'] . '</a>
                                                        <p class="text-muted">Quantity: <input type="number" class="quantity-input" value="' . $item['Quantity'] . '" min="1" data-price="' . $item['ProductPrice'] . '" data-cart-id="' . $item['CartId'] . '" style="width: 60px;" /></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-sm-6 col-6 d-flex flex-row flex-lg-column flex-xl-row text-nowrap">
                                            <div class="total-price">
                                                <text class="h6">$' . number_format($totalPrice, 2) . '</text> <br />
                                                <small class="text-muted text-nowrap"> $' . number_format($item['ProductPrice'], 2) . ' / per item </small>
                                            </div>
                                        </div>
                                        <div class="col-lg col-sm-6 d-flex justify-content-sm-center justify-content-md-start justify-content-lg-center justify-content-xl-end mb-2">
                                            <div class="float-md-end">   
                                                <button class="btn btn-light border text-danger" type="submit" name="removeCartId" value="' . $item['CartId'] . '">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                    </form>';
                                }
                            } else {
                                echo "<p>Your cart is empty.</p>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <!-- Cart -->

                <!-- Summary -->
                <div class="col-lg-3">
                    <div class="card shadow-0 border">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <p class="mb-2">Total price:</p>
                                <p class="mb-2" id="total-price">$<?php echo number_format($total, 2); ?></p>
                            </div>
                            <hr />
                            <div class="mt-3">
                                <a href="#" class="btn btn-success w-100 shadow-0 mb-2"> Make Purchase </a>
                                <a href="#" class="btn btn-light w-100 border mt-2"> Back to shop </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Summary -->
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

</body>

</html>