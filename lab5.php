<?php 

if (!empty($_FILES['upload']['name'])){
    $file = $_FILES['upload'];
    $file_name = $file['name'];
    $tmp_name = $file['tmp_name'];

    move_uploaded_file($tmp_name, 'img/'.$file_name);
}

?>


<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  </head>
  <body class = "container">
    <form action="login.php" method="GET">
    <div class="mb-3">
       <label for="" class="form-label">Email</label>
       <input type="email" class="form-control" name="email" id="" aria-describedby="emailHelpId" placeholder="">
       <small id="emailHelpId" class="form-text text-muted">Help text</small>
     </div>    
     <div class="mb-3">
       <label for="" class="form-label">Password</label>
       <input type="password" class="form-control" name="password" id="" aria-describedby="emailHelpId" placeholder="">
       <small id="emailHelpId" class="form-text text-muted">Help text</small>
     </div>  
     <div class="mb-3">
  <label for="formFile" class="form-label">Default file input example</label>
  <input class="form-control" type="file" id="formFile">
</div>
     <button type="button" class="btn btn-primary">Submit</button>
    </form>

  <div class="div">
    <div class="form" method="POST" enctype="multipart/form-data" action="">
        <legend>Form Upload</legend>
        <div class="form-group">
            <label for="">Select</label>
            <input type="file" class="form-control" name="upload">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    <img src="img/" alt="">
  </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
  </body>
</html>