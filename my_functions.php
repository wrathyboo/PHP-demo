<?php
$default_key = "12E14F3C39E05909822C0C23A2C12DDA";
define("DEFAULT_KEY", "12E14F3C39E05909822C0C23A2C12DDA");
function getUserDATA($key, $id)
{
    if (is_null($key)) {
        $key = DEFAULT_KEY;
    }
    $url = "http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=" . $key . "&steamids=" . $id;
    return json_decode(file_get_contents($url));
}

function getLibraryDATA($key, $id)
{
    if (is_null($key)) {
        $key = DEFAULT_KEY;
    }
    $url = 'http://api.steampowered.com/IPlayerService/GetOwnedGames/v0001/?key=' . $key . '&steamid=' . $id . '&include_appinfo=1';
    return json_decode(file_get_contents($url));
}

function getFriendlistDATA($key, $id)
{
    if (is_null($key)) {
        $key = DEFAULT_KEY;
    }
    $url = 'http://api.steampowered.com/ISteamUser/GetFriendList/v0001/?key=' . $key . '&steamid=' . $id;
    if (!$url) {
        throw new Exception('Division by zero.');
    }
    return json_decode(file_get_contents($url));
}

function getSteamLibraryDATA()
{
    $url = "http://api.steampowered.com/ISteamApps/GetAppList/v0002/";
    return json_decode(file_get_contents($url));
}

function countFriendlist($list)
{
    $cnt = 0;
    foreach ($list->friendslist->friends as $friend) {
        $cnt++;
    }
    return $cnt;
}

function sortByName_Asc($array){
    $name = array_column($array, 'name');
    array_multisort($name, SORT_ASC, $array);
    return $array;
}
function sortByName_Desc($array){
    $name = array_column($array, 'name');
    array_multisort($name, SORT_DESC, $array);
    return $array;
}
function sortById_Asc($array){
    $id = array_column($array, 'id');
    array_multisort($id, SORT_ASC, $array);
    return $array;
}
function sortById_Desc($array){
    $id = array_column($array, 'id');
    array_multisort($id, SORT_DESC, $array);
    return $array;
}

function getUserStatus($value)
{
    switch ($value) {
        case 1:
            return "Online";

        case 2:
            return "Busy";

        case 3:
            return  "Away";

        case 4:
            return  "Snooze";

        case 5:
            return  "looking to trade";

        case 6:
            return  "looking to play";

        default:
            return "Offline";
    }
}
