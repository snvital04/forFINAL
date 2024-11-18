<?php
include 'php/profile.php';
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
            <!-- Button to trigger modal -->
            <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#updateUser">
              <?php if (!empty($image_path)): ?>
                <img src="php/image_upload/profile_pic.png" src="php/image_upload/profile_pic.jpg"
                  class="border border-dark rounded-circle" alt="Profile Picture" style="width: 100px; height: 100px;">
              <?php else: ?>
                <p>No profile picture uploaded.</p>
              <?php endif; ?>
              <span class="text-secondary">
                @<?php echo htmlspecialchars($_SESSION['username'] ?? ''); ?>
              </span>

            </button>
            <form action="php/upload.php" class="py-1" method="post" enctype="multipart/form-data">
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
      <div class="modal fade" id="updateUser" tabindex="-1" aria-labelledby="updateUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="updateUser ModalLabel">Edit Profile</h5>
              <button type="button" class="close bg-danger " data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col text-center">
                  <!-- Button to trigger modal -->

                  <?php if (!empty($image_path)): ?>
                    <img src="php/image_upload/profile_pic.png" src="php/image_upload/profile_pic.jpg"
                      class="border border-dark rounded-circle" alt="Profile Picture"
                      style="width: 100px; height: 100px;">
                  <?php else: ?>
                    <p>No profile picture uploaded.</p>
                  <?php endif; ?><br>
                  <span class="text-secondary">
                    @<?php echo htmlspecialchars($_SESSION['username'] ?? ''); ?>
                  </span>
                </div>

                <form method="POST" action="php/profile.php">
                  <input type="hidden" name="form_id" value="update_username">
                  <br><br>
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username" value=""
                      placeholder="@<?php echo htmlspecialchars($_SESSION['username'] ?? ''); ?>" required>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                      <button type="submit" class="btn btn-primary" id="confirmSubmit">Save Changes</button>
                    </div>
                  </div>
                </form>

              </div>

            </div>
          </div>
        </div>
      </div>

      <!-- Loading Spinner -->
      <div id="loading" class="text-center mt-3">
        <div class="spinner-border" role="status">
          <span class="sr-only">Loading...</span>
        </div>
      </div>

      <div class="col-md-8">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Personal Information</h5>
            <form method="POST" id="profileForm" action="php/profile.php">
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
                  disabled><?php echo isset($address) ? htmlspecialchars($address) : '123 Main St, Anytown, USA'; ?></textarea>
              </div>

              <button type="button" id="editButton" class="btn btn-primary">Edit</button>
              <button type="submit" name="update_profile" id="saveButton" class="btn btn-success"
                style="display: none;">Save Changes</button>
              <button type="button" id="cancelButton" class="btn btn-secondary" style="display: none;">Cancel</button>
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
  </script>
  <script src="js/profile.js"></script>
</body>


</html>