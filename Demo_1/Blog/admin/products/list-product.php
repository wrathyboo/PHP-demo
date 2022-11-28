
<?php 

include_once '../../database-connect/connect.php';
$sql = "SELECT * FROM product";
$result = mysqli_query($connect, $sql);

?>


<!doctype html>
<html lang="en">
<head>
<title>Title</title>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Logo</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="../category/list-category.php">Danh mục</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../products/list-product.php">Sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../account/list-account.php">Tài khoản</a>
                </li>
                
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
<h1>Sản phẩm</h1>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Ảnh</th>
           
        </tr>
    </thead>
    <tbody>
        <?php foreach($result as $row) :?>
        <tr>
            <td><?= $row['id']?></td>
            <td><?= $row['name']?></td>
            <td><?= $row['price']?></td>
            <td><img src="<?= $row['image']?>" alt=""></td>
            
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
</body>
</html>