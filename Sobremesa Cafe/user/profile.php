<?php
session_start();
include __DIR__ . '/db/dbcon.php';

// Initialize messages
$successMessage = "";
$errorMessage = "";

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
  header("Location: ../index.php");
  exit();
}

// Get user ID from session
$userId = $_SESSION['user_id'];

// Fetch user data from the database
$stmt = $conn->prepare("SELECT * FROM tbuser WHERE id = ?");
$stmt->execute([$userId]);

if ($stmt->rowCount() > 0) {
  $user = $stmt->fetch(PDO::FETCH_ASSOC);
  $firstname = htmlspecialchars($user['firstname']);
  $lastname = htmlspecialchars($user['lastname']);
  $birthday = htmlspecialchars($user['birthday']);
  $username = htmlspecialchars($user['username']);
  $image_path = htmlspecialchars($user['image_path']); // Fetch the existing image path
} else {
  header("Location: ../index.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>User Profile</title>
</head>

<body>
  <!-- Header Include the header.php file-->
  <?php include 'header.php'; ?>
  <!-- /Header -->

  <div class="container py-2">
    <div class="profile-header text-center">
      <h2>User Profile</h2>
      <p class="text-muted">Manage your profile information and settings</p>
    </div>

    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Profile Picture</h5>
            <!-- Display the uploaded image if it exists -->
            <?php if (!empty($image_path)): ?>
            <img src="php/<?php echo htmlspecialchars($_SESSION['image_path']) ?>"
              class="border border-dark rounded-circle" alt="Profile Picture" style="width: 100px; height: 100px;">
            <?php else: ?>
            <p>No profile picture uploaded.</p>
            <?php endif; ?>

            <form action="php/profile.php" class="py-1" method="post" enctype="multipart/form-data">
              <input type="file" name="image" accept="image/*" required>
              <div class="mt-3">
                <input type="submit" class="btn btn-primary btn-block" value="Upload Image">
              </div>
            </form>

          </div>
        </div>
      </div>

      <div class="col-md-8">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Personal Information</h5>

            <form method="POST" id="profileForm" action="php/profile.php">
              <div class="form-group">
                <label for="username">User Name</label>
                <input type="text" class="form-control" name="username" id="username"
                  value="<?php echo isset($username) ? htmlspecialchars($username) : ''; ?>">
              </div>
              <div class="form-group">
                <label for="firstname">First Name</label>
                <input type="text" class="form-control" name="firstname" id="firstname"
                  value="<?php echo isset($firstname) ? htmlspecialchars($firstname) : ''; ?>">
              </div>
              <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type=" text" class="form-control" name="lastname" id="lastname"
                  value="<?php echo isset($lastname) ? htmlspecialchars($lastname) : ''; ?>">
              </div>
              <div class="form-group">
                <label for="bday">Birthday</label>
                <input type="date" class="form-control" name="bday" id="bday"
                  value="<?php echo isset($birthday) ? htmlspecialchars($birthday) : ''; ?>">
              </div>
              <div class="form-group">
                <label for="address">Address</label>
                <textarea class="form-control" name="address" id="address"
                  rows="3"><?php echo isset($address) ? htmlspecialchars($address) : '123 Main St, Anytown, USA'; ?></textarea>
              </div>
              <button type="submit" name="update_profile" class="btn btn-success">Save Changes</button>
            </form>
          </div>
        </div>

        <div class="card mt-4">
          <div class="card-body">
            <h5 class="card-title">Order History</h5>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Order ID</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>#12345</td>
                  <td>2023-01-15</td>
                  <td>Shipped</td>
                  <td>$49.99</td>
                </tr>
                <tr>
                  <td>#12346</td>
                  <td>2023-01-20</td>
                  <td>Delivered</td>
                  <td>$29.99</td>
                </tr>
                <tr>
                  <td>#12347</td>
                  <td>2023-02-05</td>
                  <td>Processing</td>
                  <td>$19.99</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>