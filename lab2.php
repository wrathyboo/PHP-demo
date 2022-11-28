<?php
$path = isset($_POST['path']) ? $_POST['path'] : 'img';
$name = NULL;
$string = NULL;
$cnt = 0;
$image_data = NULL;
$modal_size = NULL;

function CountFiles($path)
{
  $count = 0;
  foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path)) as $filename) :
    if (($filename == $path . '\.') || ($filename == $path . '\..')) {
      continue;
    }
    $count += 1;
  endforeach;
  return $count;
}

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


?>
<?php include "header.php" ?>

<!doctype html>
<html lang="en">

<head>
  <title>Tú PHP</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.0-beta1 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>

<body>
  <div class="container">
    <div class="d-flex">
      <div class="flex-grow-1 ms-3">
        <h1 class="mt-0">Lab 2</h1>
        <p>This project will show all existing image files in the target directory.</p>
      </div>
      <div class="flex-shrink-0">
        <img src="#" alt="" width="">
      </div>
    </div>
  </div>

  <div class="container">
    <form method="post" action="">
      <label for="cars">Change Directory:</label>
      <select name="path" id="">
        <option value="img" selected="selected">img</option>
        <option value="img/Art">Art</option>
        <option value="img/Wallpaper">Wallpaper</option>
        <option value="img/Shitpost">Shitpost</option>

      </select>
      <input type="submit" class="bg-primary rounded" style="border: 0; color:aliceblue;">
    </form>

  </div>

  <div class="container">
    <h2> Total images found in <?php switch ($path) {
                                  case "img":
                                    echo 'img';
                                    break;
                                  case "img/Art":
                                    echo 'Art';
                                    break;
                                  case "img/Wallpaper":
                                    echo 'Wallpaper';
                                    break;
                                  case "img/Shitpost":
                                    echo 'Shitpost';
                                } ?> folder: <?= CountFiles(realpath($path)) ?> </h2>
  </div>

  <div class="container">
    <div class="row">
      <?php foreach (GetImages($path) as $file) :
        $cnt++;
        $image_data = getimagesize($path . '/' . $file);
        if ($image_data[0] >= 1140) {
          $modal_size = 'modal-xl';
        } else if ($image_data[0] >= 800) {
          $modal_size = 'modal-lg';
        } else {
          $modal_size = NULL;
        }
      ?>
        <div class="col-4" tabindex="-1">
          <img src="<?php echo $path . '/' . $file ?>" style="height: 350px; width: 100%;" />
          <!-- Button trigger modal -->
          <div class="text-center" style="margin-top: 10px; margin-bottom:30px">
            <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#model-<?= $cnt ?>">
              View
            </button>
          </div>
        </div>

        <!-- Modal -->
        <div class="modal fade <?= $modal_size ?> " id="model-<?= $cnt ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title"><?= $file ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <img src="<?php echo $path . '/' . $file ?>" style="width: 100%" />
                <?= $image_data[3] ?>
              </div>
              <div class="modal-footer">
                <div class="text-center">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>

      <?php
      endforeach ?>

    </div>
  </div>


  <div class="container-md" style="margin-top: 50px">
    <table class="table table-hover table-bordered">
      <thead>
        <tr>
          <th>#</th>
          <th>Picture</th>
          <th>File Name</th>
          <th>Information</th>
        </tr>
      </thead>
      <tbody>
        <?php $cnt = 0;
        $name;
        $ext;
        foreach (GetImages($path) as $file) :
          $name = $file;
          $name = substr((string)$file, 0, strrpos((string)$file, '.'));
          $ext = pathinfo($file, PATHINFO_EXTENSION);
          $cnt++;
          $image_data = getimagesize($path . '/' . $file);
        ?>
          <tr>
            <td scope="row" class="text-center align-middle"><?= $cnt ?></td>
            <td><img src="<?php echo $path . '/' . $file ?>" style="height: 200px; width: 200px;" /></td>
            <td><?= $name ?></td>
            <td><?= $image_data[3] . ' <br> File type: ' . $ext ?></td>
          </tr>
        <?php
        endforeach ?>

      </tbody>
    </table>
  </div>





  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>

</html>