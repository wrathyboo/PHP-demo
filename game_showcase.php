<?php
session_start();
include "header.php";
include_once 'connect.php';
include_once 'my_functions.php';
$profile = isset($_POST['account']) ? $_POST['account'] : 'wrathyboo';
$flag = isset($_POST['hideImg']) ? $_POST['hideImg'] : 0;
$SortLibraryA = isset($_POST['sortA']) ? $_POST['sortA'] : 0;
$SortLibraryD = isset($_POST['sortD']) ? $_POST['sortD'] : 0;
$sql_account = "SELECT * FROM account";
$getUser_sql = "SELECT * FROM account WHERE username='$profile'";
$account = mysqli_query($connect, $sql_account);
$userInfo = mysqli_query($connect, $getUser_sql);
$favoriteList = array();
$hideErrorImage = False;
function cmp($a, $b)
{
    return strcmp($a["name"], $b["name"]);
}
function addtoList($request, $user)
{
    array_push($favoriteList, $request);
    file_put_contents('client/library/' . $user . '.test.json', json_encode($favoriteList));
}

if (isset($_POST["add-favorite"])) {
    if ($_SESSION["id"] != "") {
        $_SESSION["id"] .= ",";
    }

    $_SESSION["id"] .= $_POST["add-favorite"];
} else {
    file_put_contents('client/library/' . $profile . '.test.json', json_encode($_SESSION));
    $_SESSION["id"] = "";
}

foreach ($userInfo as $data) {
    $library = array();
    $totalGames = 0;
    $user = getUserDATA($data['api_key'], $data['user_id']);

    $getlibrary = getLibraryDATA($data['api_key'], $data['user_id']);
    file_put_contents('client/library/' . $data['username'] . '.favoritelist.json', json_encode($getlibrary));
    if ($data['friendlist_visibility'] == 1) {
        $friendlist = getFriendlistDATA($data['api_key'], $data['user_id']);
    }
    for ($i = 0; $i < $getlibrary->response->game_count; $i++) {
        $library[$i]['id'] = $getlibrary->response->games[$i]->appid;
        $library[$i]['name'] = $getlibrary->response->games[$i]->name;
        $totalGames++;
    }
}


// $external_link = "https://steamcdn-a.akamaihd.net/steam/apps/6020/library_600x900_2x.jpg";
// if (@getimagesize($external_link)) {
//     echo  "image exists ";
// } else {
//     echo  "image does not exist ";
// }
?>


<div class="container">

    <div class="">
        <form method="post" action="" style="margin-top:50px" class="d-flex-grow-1 ">

            <label for="" class="form-label">Change Profile: </label>

            <div class="col col-md-9 col-lg-7 col-xl-5">

                <select class="form-control" name="account" id="" onchange="this.form.submit()">
                    <?php foreach ($account as $selected_username) : ?>
                        <option value="<?= $selected_username['username'] ?>" <?= $profile == $selected_username['username'] ? 'selected' : NULL ?>><?= $selected_username['username'] ?></option>
                    <?php endforeach; ?>
                </select>
                <!-- <input type="submit" class="btn btn-primary flex-grow-1"> -->
            </div>
            <div class="form-check" id="">
                <input class="form-check-input" name="hideImg" type="checkbox" value="1" id="flexCheckDefault" onchange="this.form.submit()" <?= ($flag == 0) ? NULL : "checked" ?>>
                <label class="form-check-label" for="flexCheckDefault">
                    Hide Unavailable Images
                </label>
            </div>
            <div class="form-check-lable-library d-flex">
            <label class="form-check-label" style="margin-right:35px">
                     Sort Library:
                </label>
          <div>
          <div class="form-check">
                <input class="form-check-input" name="sortA" type="checkbox" value="1" id="flexCheckSortA" onchange="this.form.submit()" <?= ($SortLibraryA == 1) ? "checked" : (($SortLibraryD == 1) ? "disabled" : NULL);  ?>>
                <label class="form-check-label" for="flexCheckSortA">
                     Ascending
                </label>

            </div>
            <div class="form-check">
                <input class="form-check-input" name="sortD" type="checkbox" value="1" id="flexCheckSortD" onchange="this.form.submit()" <?= ($SortLibraryD == 1) ? "checked" : (($SortLibraryA == 1) ? "disabled" : NULL); ?>>
                <label class="form-check-label" for="flexCheckSortD">
                     Descending
                </label>
            </div>
          </div>
            </div>
        </form>
    </div>


    <div class="profile" style="margin-bottom: 70px;margin-top: 10px">
        <div class="col col-md-9 col-lg-7 col-xl-5">
            <div class="card bg-light" style="border-radius: 15px;">
                <div class="card-body p-4">
                    <div class="d-flex text-black">
                        <div class="flex-shrink-0">
                            <img src="<?= $user->response->players[0]->avatarfull ?>" alt="Generic placeholder image" class="img-fluid" style="width: 180px; border-radius: 10px;">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="mb-1"><?= $user->response->players[0]->personaname ?></h5>
                            <p class="mb-2 pb-1" style="color: #2b2a2a;"><?= property_exists($user->response->players[0], 'realname') ? $user->response->players[0]->realname : '</br>' ?></p>
                            <div class="d-flex justify-content-start rounded-3 p-2 mb-2" style="background-color: #efefef;">
                                <div>
                                    <p class="small text-muted mb-1">Games</p>
                                    <p class="mb-0"><?= $getlibrary->response->game_count ?></p>
                                </div>
                                <div class="px-3">
                                    <p class="small text-muted mb-1">Country</p>
                                    <p class="mb-0"><?= property_exists($user->response->players[0], 'loccountrycode') ? $user->response->players[0]->loccountrycode : '</br>' ?></p>
                                </div>
                                <div>
                                    <!-- 0 - Offline, 1 - Online, 2 - Busy, 3 - Away, 4 - Snooze, 5 - looking to trade, 6 - looking to play -->
                                    <p class="small text-muted mb-1">Status</p>
                                    <p class="mb-0"><?= getUserStatus($user->response->players[0]->personastate) ?></p>
                                </div>
                                <!-- <div>
                                    <p class="small text-muted mb-1">Friends</p>
                                    <p class="mb-0"> empty($friendlist) ? 'Private' : countFriendlist($friendlist) </p>
                                </div> -->
                            </div>
                            <div class="d-flex pt-1">
                                <button type="button" class="btn btn-outline-primary me-1 flex-grow-1">Message</button>
                                <a href="<?= $user->response->players[0]->profileurl ?>" target="_blank">
                                    <button type="button" class="btn btn-primary flex-grow-1">See Profile</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="additional-options">
        <form method="post" action="">

        </form>
    </div>
    <h3 class="text-center bg-dark bg-gradient text-light">Your Library</h3>
    <div class="row seven-cols ">

        <?php
        ($SortLibraryA == 1) ? $library = sortByName_Asc($library) : (
                ($SortLibraryD == 1) ? $library = sortByName_Desc($library) :
                NULL
            );

        foreach ($library as $game) :
            if ($flag == 1) {
                if (empty(@getimagesize("https://steamcdn-a.akamaihd.net/steam/apps/" . $game['id'] . "/library_600x900_2x.jpg"))) {
                    continue;
                }
            }
        ?>
            <div style="margin-bottom: 15px ;" class="col-md-1"><a href="https://store.steampowered.com/app/<?= $game['id'] ?>/" target="_blank"><div class="game-banner"><img src="https://steamcdn-a.akamaihd.net/steam/apps/<?= $game['id'] ?>/library_600x900_2x.jpg" alt="" width="160px" height="250px" onerror="this.src='img/store_home_share.jpg';"></div></a>
                <span><?= $game['name'] ?></span>
                <form action="" method="post">
                    <button type="submit"><i class="fa fa-heart text-danger btn-light" aria-hidden="true" name="add-favorite"></i></button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include "footer.php"; ?>