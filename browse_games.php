<?php include "header.php" ;
include_once 'my_functions.php';


$library = getSteamLibraryDATA();
print_r($library);
?>




<body>
    

<div class="row seven-cols ">

<?php $cnt = 0; foreach ($library->applist->apps as $game) :
$cnt++;
?>

    <div style="margin-bottom: 15px ;" class="col-md-1 "><a href="https://store.steampowered.com/app/<?= $game['appid'] ?>/" target="_blank"><img src="https://steamcdn-a.akamaihd.net/steam/apps/<?= $game['appid'] ?>/library_600x900_2x.jpg" alt="" width="160px" height="250px" onerror="this.src='img/store_home_share.jpg';"></a>
        <span><?= $game['name'] ?></span>
       
    </div>
<?php if($cnt == 20) break; endforeach; ?>
</div>






</body>
<?php include "footer.php" ?>