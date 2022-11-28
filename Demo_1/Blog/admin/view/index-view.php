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
    <div class="container pt-5">
        <div id="#banner" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#banner" data-slide-to="0" class="active"></li>
                <li data-target="#banner" data-slide-to="1"></li>
                <li data-target="#banner" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img src="../../img/about0.jpg" width="100%" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img src="../../img/about0.jpg" width="100%" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img src="../../img/about0.jpg" width="100%" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#banner" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#banner" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <!-- Sản phẩm -->
    <div class="container mt-5">
        <div class="row">
            <?php foreach($result as $row) :?>
            <div class="col-md-4">
                <div class="jumbotron">
                   <img src="../../img/about0.jpg" width="100%" alt="">
                    <p class="lead">Jumbo helper text</p>
                    <hr class="my-2">
                    <h3><?= $row['name']?></h3>
                    <p><?= $row['price']?></p>
                    <p class="lead">
                        <a class="btn btn-primary btn-lg" href="Jumbo action link" role="button">Mua</a>
                    </p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
  </body>
</html>