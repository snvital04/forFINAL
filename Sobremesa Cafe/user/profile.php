<?php
session_start();
include __DIR__ . '/../db/dbcon.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if ($_POST['form_id'] === 'update_info') {
            $firstName = htmlspecialchars(trim($_POST['firstname']));
            $lastName = htmlspecialchars(trim($_POST['lastname']));
            $birthday = htmlspecialchars(trim($_POST['bday']));
            $address = htmlspecialchars(trim($_POST['address']));

            $updateStmt = $conn->prepare("UPDATE UserInfo SET firstname = ?, lastname = ?, birthdate = ?, address=? WHERE userid = ?");
            if ($updateStmt->execute([$firstName, $lastName, $birthday, $address, $_SESSION['user_id']])) {
                $_SESSION['firstname'] = $firstName;
                $_SESSION['lastname'] = $lastName;
                $_SESSION['birthday'] = $birthday;
                $_SESSION['address'] = $address;
                header('location:profile.php');
                exit(); // Ensure to exit after redirect
            } else {
                $_SESSION['errorMessage'] = "Error updating profile. Please try again.";
            }
        }
        if ($_POST['form_id'] === 'update_username') {
            $username = htmlspecialchars(trim($_POST['username']));

            $stmt = $conn->prepare("SELECT COUNT(*) FROM UserAccess WHERE username = ?");
            $stmt->execute([$username]);

            if ($stmt->fetchColumn() > 0) {
                echo $error_message = 'Username already exists';
                header("Location: profile.php?showUserModal=true");
                exit();
            } else {
                $stmt = $conn->prepare("UPDATE UserAccess SET username= ? WHERE id = ?");
                $stmt->execute([$username, $_SESSION['user_id']]);
                $_SESSION['username'] = $username;
                exit();
            }
        }
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <title>User Profile</title>
</head>


<body>
    <?php
include 'php/session.php';
$user_id = isset($_SESSION['user_id']); // Store user ID in session
$image_path = isset($_SESSION['image_path']); // Store user ID in session
include 'header.php';
?>
    <div class="container py-2">
        <div class="profile-header text-center text-white">
            <h2>User Profile</h2>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Profile Picture</h5>
                        <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#updateUser">
                            <?php if (!empty($image_path)): ?>
                            <img src="<?php echo $image_path; ?>" class="border border-dark rounded-circle"
                                alt="Profile Picture" style="width: 100px; height: 100px;">
                            <?php else: ?>
                            <p>No profile picture uploaded.</p>
                            <?php endif; ?>
                            <span
                                class="text-secondary">@<?php echo htmlspecialchars($_SESSION['username'] ?? ''); ?></span>
                        </button>
                        <form class="py-1" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="form_id" value="update_img">
                            <input type="file" name="image" accept="image/*" required>
                            <div class="mt-3">
                                <input type="submit" class="btn btn-primary btn-block" value="Upload Image">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal edit username -->
            <div class="modal fade" id="updateUser" tabindex="-1" aria-labelledby="updateUserModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="updateUserModalLabel">Edit Profile</h5>
                            <button type="button" class="close bg-danger" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col text-center">
                                    <?php if (!empty($image_path)): ?>
                                    <img src="<?php echo $image_path; ?>" class="border border-dark rounded-circle"
                                        alt="Profile Picture" style="width: 100px; height: 100px;">
                                    <?php else: ?>
                                    <p>No profile picture uploaded.</p>
                                    <?php endif; ?><br>
                                    <span
                                        class="text-secondary">@<?php echo htmlspecialchars($_SESSION['username'] ?? ''); ?></span>
                                </div>

                                <form method="POST">
                                    <input type="hidden" name="form_id" value="update_username">
                                    <br><br>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" name="username" value=""
                                            placeholder="<?php echo htmlspecialchars($_SESSION['username'] ?? ''); ?>"
                                            required>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary" id="confirmSubmit">Save
                                            Changes</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Personal Information</h5>
                        <form method="post" id="profileForm">
                            <input type="hidden" name="form_id" value="update_info">
                            <div class="form-group">
                                <label for="firstname">First Name</label>
                                <input type="text" class="form-control" name="firstname" id="firstname"
                                    value="<?php echo htmlspecialchars($_SESSION['firstname'] ?? ''); ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="lastname">Last Name</label>
                                <input type="text" class="form-control" name="lastname" id="lastname"
                                    value="<?php echo htmlspecialchars($_SESSION['lastname'] ?? ''); ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="bday">Birthday</label>
                                <input type="date" class="form-control" name="bday" id="bday"
                                    value="<?php echo htmlspecialchars($_SESSION['birthday'] ?? ''); ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea class="form-control" name="address" id="address" rows="3"
                                    disabled><?php echo htmlspecialchars($_SESSION['address'] ?? ''); ?></textarea>
                            </div>

                            <button type="button" id="editButton" class="btn btn-primary">Edit</button>
                            <button type="submit" name="update_profile" id="saveButton" class="btn btn-success"
                                style="display: none;">Save Changes</button>
                            <button type="button" id="cancelButton" class="btn btn-secondary"
                                style="display: none;">Cancel</button>
                        </form>
                    </div>
                </div>

                <div class="col-md-8">
                    <?php
// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "Please log in to view your cart.";
    exit;
}

// Get userId from session
$userId = $_SESSION['user_id'];

// Fetch cart items for the logged-in user
$stmt = $conn->prepare("SELECT Cart.CartId, Products.ProductName, Products.ProductPrice, Cart.Quantity 
                        FROM Cart 
                        JOIN Products ON Cart.ProductId = Products.ProductId
                        WHERE Cart.UserId = ?");
$stmt->execute([$userId]);

$cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

// If cart is empty
if (empty($cartItems)) {
    echo "Your cart is empty.";
    exit;
}

// Display cart items
foreach ($cartItems as $item) {
    echo "<div class='cart-item'>";
    echo "<h5>" . htmlspecialchars($item['ProductName']) . "</h5>";
    echo "<p>Price: $" . number_format($item['ProductPrice'], 2) . "</p>";
    echo "<p>Quantity: " . $item['Quantity'] . "</p>";
    echo "<p>Total: $" . number_format($item['ProductPrice'] * $item['Quantity'], 2) . "</p>";
    echo "</div>";
}

// Optionally, you can also calculate the total cart price
$totalPrice = 0;
foreach ($cartItems as $item) {
    $totalPrice += $item['ProductPrice'] * $item['Quantity'];
}
echo "<p>Total Cart Price: $" . number_format($totalPrice, 2) . "</p>";
?>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script src="js/profile.js"></script>
</body>

</html>