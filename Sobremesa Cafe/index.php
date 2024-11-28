<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@Sobremesa Cafe</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="user/style.css">
</head>

<body id="home" class=" bg-body-custom">
    <?php
session_start(); // Start the session to access session variables

// Check if session role is set
if (isset($_SESSION['role'])) {
    // Get the role from the session
    $role = $_SESSION['role'];

    // Redirect based on the role
    if ($role == 6) {
        // User role, redirect to user page
        include 'user/index.php';
    } elseif ($role == 7) {
        // Seller role, redirect to seller page
        include 'seller/index.php';
    } elseif ($role == 8) {
        // Admin role, redirect to admin page
        include 'admin/index.php';
    } else {
        // Handle invalid or unexpected roles (optional)
        echo "Unauthorized access or invalid role.";
    }
} else {
    // If the session doesn't have a role set, you can redirect them to the login page
    // or show a default page.
    include 'user/index.php'; // Default page if no role is set
}
?>

</body>

</html>