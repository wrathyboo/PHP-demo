<?php
include_once 'connect.php';


$sql_account = "SELECT * FROM account";
$account = mysqli_query($connect, $sql_account);
// Initialize an URL to the variable
$url = "http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=12E14F3C39E05909822C0C23A2C12DDA&steamids=765613457060587";

$user = json_decode(file_get_contents($url));
// Use get_headers() function
$headers = @get_headers($url);
  
// Use condition to check the existence of URL
if($headers && strpos( $headers[0], '200')) {
    $status = "URL Exist";
}
else {
    $status = "URL Doesn't Exist";
}
if (!$user->response->players){
    echo "profile empty";
}
// Display result
echo($status);
  

?>







<?php include "header.php" ?>
<body>
    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">Column 1</th>
                    <th scope="col">Column 2</th>
                    <th scope="col">Column 3</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($account as $data) : ?>
                <tr class="">
                    <td scope="row">R1C1</td>
                    <td>R1C2</td>
                    <td>R1C3</td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
</body>
<?php include "footer.php" ?>