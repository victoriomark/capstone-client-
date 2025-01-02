<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Category List</title>

</head>
<body>
<header>
    <?php
    include '../../includes/page_nav.php';
    ?>
<main class="container-fluid">
    <table id="myTable" class="table table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Category Name</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        include_once '../controllers/categoryConroller.php';
        $categoryList = new \controllers\categoryConroller();
        $categoryList->show();
        ?>
        </tbody>
    </table>
</main>
<script src="../../assets/js/bootstrap.bundle.min.js"></script>
<script src="../JQUERY/category.js"></script>
</body>
</html>
