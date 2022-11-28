<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<link rel="stylesheet" href="{{url('home/css/welcome.css')}}">
<link rel="stylesheet" href="{{url('home/css/style-2.css')}}" />
<link rel="stylesheet" href="{{url('home/css/style.css')}}" />
<link rel="stylesheet" href="{{url('home/css/responsive.css')}}" />
<link rel="stylesheet" href="{{url('home/css/home.css')}}" />
</head>

<body>
    <header>

        <!-- This div is  intentionally blank. It creates the transparent black overlay over the video which you can modify in the CSS -->
        <div class="overlay"></div>
      
        <!-- The HTML5 video element that will create the background video on the header -->
        <div class="radio ratio-16x9">
            <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
                <source src="images/backgrounds/video/items/autumn_leaves.webm" type="video/webm">
              </video>
        </div>
      
        <!-- The header content -->
        <div class="container h-100">
          <div class="d-flex h-100 text-center align-items-center">
            <div class="w-100 d-flex justify-content-center" >
               <div class="login-box bg-light " style="width:30%">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="section-title" style="margin-top:40px">
                                <h2 class="ec-bg-title">Register</h2>
                                <h2 class="ec-title" >Create Account</h2>
                                <p class="sub-title mb-3">Best place to buy and sell digital products</p>
                            </div>
                        </div>
                        <div class="ec-login-wrapper">
                            <div class="ec-login-container">
                                <div class="ec-login-form">
                                    <form action="" method="post">
                                    @csrf
                                    <span class="ec-login-wrap">
                                        <label>Name</label>
                                        <input type="text" name="name" placeholder="Enter your name" required />
                                    </span>
                                        <span class="ec-login-wrap">
                                            <label>Email Address*</label>
                                            <input type="text" name="email" placeholder="Enter your email add..." required />
                                        </span>
                                        <span class="ec-login-wrap">
                                            <label>Password*</label>
                                            <input type="password" name="password" placeholder="Enter your password" required />
                                        </span>
                                       <div style="margin-top:20px; margin-bottom:20px">
                            
                                        <span class="ec-login-wrap ec-login-btn">
                                    
                                            <button class="btn btn-primary" type="submit">Register</button>
                                        </span>
                                       </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               </div>
            </div>
          </div>
        </div>
      </header>
  <main>

  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>