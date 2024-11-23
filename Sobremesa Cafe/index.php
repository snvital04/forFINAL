<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@Sobremesa Cafe</title>

</head>

<body id="home" class=" bg-body-custom">
    <?php 
    if (isset($_SESSION['user_id'])) {
        include 'user/index.php';
    }
    elseif (isset($_POST[''])) {
        include 'admin/index.php';
    }
    elseif (isset($_POST[''])) {
        include 'seller/index.php';
    }
    else{
        include 'user/index.php';
    }
?>
</body>

</html>