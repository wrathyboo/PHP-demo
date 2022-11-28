<?php
include_once 'connect.php';
if (!empty($_FILES['upload']['name'])) {
  $file = $_FILES['upload'];
  $file_name = $file['name'];
  $tmp_name = $file['tmp_name'];

  move_uploaded_file($tmp_name, 'img/' . $file_name);
}
$user_URL = "http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=12E14F3C39E05909822C0C23A2C12DDA&steamids=76561198857060587";
$user = json_decode(file_get_contents($user_URL), true);

$library_URL = 'http://api.steampowered.com/IPlayerService/GetOwnedGames/v0001/?key=12E14F3C39E05909822C0C23A2C12DDA&steamid=76561198857060587&include_appinfo=1';
$library = json_decode(file_get_contents($library_URL));

$steamgames_URL = "http://api.steampowered.com/ISteamApps/GetAppList/v0002/";
$steamgames = json_decode(file_get_contents($steamgames_URL));


// echo $library->response->game_count;
// print_r($library->response->games[0]->appid);
// for ($i = 0; $i < ($library->response->game_count); $i++){
//    echo $library->response->games[$i]->appid . ", name = ". $library->response->games[$i]->name. "</br>";
// }


?>
<?php include "header.php" ?>

<!doctype html>
<html lang="en">
<?php include "header_carosel.php" ?>

<body>

  <div class="login_section container" style="margin-top:70px">
  <section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="img/Banner/draw2banner.png"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form>
          <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
            <p class="lead fw-normal mb-0 me-3">Sign in with</p>
            <button type="button" class="btn btn-primary btn-floating mx-1">
              <i class="fab fa-facebook-f"></i>
            </button>

            <button type="button" class="btn btn-primary btn-floating mx-1">
              <i class="fab fa-twitter"></i>
            </button>

            <button type="button" class="btn btn-primary btn-floating mx-1">
              <i class="fab fa-linkedin-in"></i>
            </button>
          </div>

          <div class="divider d-flex align-items-center my-4">
            <p class="text-center fw-bold mx-3 mb-0">Or</p>
          </div>

          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="email" id="form3Example3" class="form-control form-control-lg"
              placeholder="Enter a valid email address" />
            <label class="form-label" for="form3Example3">Email address</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input type="password" id="form3Example4" class="form-control form-control-lg"
              placeholder="Enter password" />
            <label class="form-label" for="form3Example4">Password</label>
          </div>

          <div class="d-flex justify-content-between align-items-center">
            <!-- Checkbox -->
            <div class="form-check mb-0">
              <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
              <label class="form-check-label" for="form2Example3">
                Remember me
              </label>
            </div>
            <a href="#!" class="text-body" style="text-decoration:none ;">Forgot password?</a>
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="button" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="#!"
                class="link-danger" style="text-decoration:none ;">Register</a></p>
          </div>

        </form>
      </div>
    </div>
  </div>
</section>
  </div>



  <!-- Bootstrap JavaScript Libraries -->
  <?php include "footer.php" ?>
</body>

</html>