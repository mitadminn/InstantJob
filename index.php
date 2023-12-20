<?php //Include Google Configuration File
    include('gconfig.php');
    
    if(!isset($_SESSION['access_token'])) {
 
$localImagePath = '/path/to/your/server/google-login-image.png';
file_put_contents($localImagePath, file_get_contents('https://www.tutsmake.com/wp-content/uploads/2019/12/google-login-image.png'));
 
$google_login_btn = '<a href="' . $google_client->createAuthUrl() . '"><img src="' . $localImagePath . '" /></a>';

    } else {
    
      header("Location:profile.php");
    }
    
    ?>
<!DOCTYPE html>
<head>
    <title>Instantjob | Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/stylesheet-onboarding.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .tab {padding: 40px !important; border: 1px solid #e4e4e4; background: #fff;}
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-12 coll">
                <div class="tab head">
                    <a href="service-provider">
                    <button type="button" id="nextBtn11" onclick="nextPrev(1)">
                    <img src="assets/img/new-instant-logo.png" class="w-100" alt="instantjob logo">
                    </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        setTimeout(function () {
        window.location.href= 'service-provider'; // the redirect goes here
        
        },5000); // 5 seconds
          
    </script>
    <script src="assets/js/index.js"></script>
</body>
</html>