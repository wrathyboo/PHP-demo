<?php 

include_once 'connect.php';
$sql = "SELECT * FROM product";
$result = mysqli_query($connect, $sql);
$user_URL = "http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=12E14F3C39E05909822C0C23A2C12DDA&steamids=76561198857060587";
$user = json_decode(file_get_contents($user_URL),true);

//$library_URL = 'http://api.steampowered.com/IPlayerService/GetOwnedGames/v0001/?key=12E14F3C39E05909822C0C23A2C12DDA&steamid=76561198857060587&include_appinfo=1';
$library = json_decode(file_get_contents($library_URL));

$steamgames_URL = "http://api.steampowered.com/ISteamApps/GetAppList/v0002/";
$steamgames = json_decode(file_get_contents($steamgames_URL));
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
<body class="container">
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
<h1>Games Showcasing</h1>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Games</th>
            <th>Worth</th>
            <th>Image</th>
           
        </tr>
    </thead>
    <tbody>
        <?php for ($i = 0; $i < $library->response->game_count ; $i++) :?>
        <tr>
            <td><?= $library->response->games[$i]->appid?></td>
            <td><?= $library->response->games[$i]->name?></td>
            <td> 0 </td>
            <td><img src="https://steamcdn-a.akamaihd.net/steam/apps/<?= $library->response->games[$i]->appid?>/library_600x900_2x.jpg"  alt="" width="160px" height="250px" onerror="this.src='img/store_home_share.jpg';"></td>
            
        </tr>
        <?php endfor;?>
    </tbody>
</table>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
</body>
</html>