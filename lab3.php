<?php 

$path = realpath('img');
function GetImages($getdir)
{
  $data = NULL;
  //get current directory
  $main_directory = getcwd();
  $images_directory = $main_directory . '/' . $getdir;
  chdir($images_directory);
  //using glob() function get images 
  $data = glob("*.{jpg,jpeg,png,gif,JPG,JPEG,PNG,GIF}", GLOB_BRACE);
  //again change the directory to working directory
  chdir($main_directory);
  return $data;
}
$temp = GetImages('img/Avatar');
$random_pos = NULL;
// function rand_pic($getPath){
//     $files = glob($getPath . "*.{jpg,jpeg,png,gif,JPG,JPEG,PNG,GIF}");
//     $file = array_rand($files);
//     return $files[$file];
// }
$info = [
    ['name' => 'Nguyen van A', 'email' => 'demo@gmail.com', 'phone' => '0981242343', 'gender' => 1, 'avatar' => $temp[array_rand($temp)]],
    ['name' => 'Tran Van Phu', 'email' => 'demo@gmail.com', 'phone' => '0983454543', 'gender' => 1, 'avatar' => $temp[array_rand($temp)] ],
    ['name' => 'Vu Thi Kim Anh', 'email' => 'demo@gmail.com', 'phone' => '0923432343', 'gender' => 0, 'avatar' => $temp[array_rand($temp)] ],
    ['name' => 'Hoang Thach Hai', 'email' => 'demo@gmail.com', 'phone' => '07456464563', 'gender' => 1, 'avatar' => $temp[array_rand($temp)]],
    ['name' => 'Kim Chi', 'email' => 'demo@gmail.com', 'phone' => '0981223443', 'gender' => 0, 'avatar' => $temp[array_rand($temp)] ],
    ['name' => 'Tran Minh Thai', 'email' => 'demo@gmail.com', 'phone' => '09813453453', 'gender' => 0, 'avatar' => $temp[array_rand($temp)] ],
];

$cart = [
   ['avatar' => $temp[array_rand($temp)], 'name' => 'Item', 'price' => 140000, 'quantity' => 2] ,
   ['avatar' => $temp[array_rand($temp)], 'name' => 'Item', 'price' => 80000, 'quantity' => 1] ,
   ['avatar' => $temp[array_rand($temp)], 'name' => 'Item', 'price' => 100000, 'quantity' => 3] ,
   ['avatar' => $temp[array_rand($temp)], 'name' => 'Item', 'price' => 65000, 'quantity' => 2] ,
   ['avatar' => $temp[array_rand($temp)], 'name' => 'Item', 'price' => 230000, 'quantity' => 1] ,
];

?>


<!doctype html>
<html lang="en">
  <head>
    <title>Lab 3</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  </head>
  <body class="container">
      <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>Avatar</th>
            </tr>
        </thead>
        <tbody>
            <?php 
              $cnt = 0; foreach ($info as $person_info) : $cnt++;?>
                <tr>
                <td scope="row"><?= $cnt?></td>
                <td><?= $person_info['name'] ?></td>
                <td><?= $person_info['email'] ?></td>
                <td><?= $person_info['phone'] ?></td>
                <td><?= ($person_info['gender']) == 0 ? 'Female' : 'Male' ?></td>
                <td><img src="img/Avatar/<?= $person_info['avatar'] ?>" alt="" style="width:50px;height:50px"></td>
                </tr>
              <?php endforeach; ?>
            
        </tbody>
      </table>
      
      <table class="table" style="margin-top:50px">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Sub Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="row"></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td scope="row"></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
      </table>
      
    

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
  </body>
</html>