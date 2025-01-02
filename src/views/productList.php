<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <title>Product List</title>    <?php

    include '../../includes/cdn_links.php';
    ?>

</head>
<body>
<header>
    <?php
    include '../../includes/page_nav.php';
    ?>
</header>
<main class="container-fluid">
    <table class="table table-hover table-striped-columns">
        <thead>
        <tr>
             <th>#</th>
             <th>Image</th>
             <th>Product Name</th>
             <th>Category</th>
             <th>Price</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        include "../controllers/productController.php";
        use controllers\productController;
        $products = new \controllers\ProductController();
        $products->show();
        ?>
        </tbody>
    </table>
</main>


<script src="../../assets/js/jquery.min.js"></script>
<script src="../../assets/js/bootstrap.bundle.min.js"></script>
<script src="../JQUERY/product.js"></script>
<script src="../JQUERY/category.js"></script>
</body>
</html>
