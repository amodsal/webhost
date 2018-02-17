<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="title" content="Domain">
   
    <link rel="shortcut icon" href="assets/img/favicon.png">

    <title>Domain</title>

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/font-awesome.css" rel="stylesheet">
    <link href="assets/css/bootstrap-theme.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/animations.css">

    <!-- siimple style -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div id="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <br/>
                    <br/>
                    <h2 class="subtitle">Search for a domain name</h2>
                    <br/>
             
                    <form action="DomainCheck.php" method="post" class="form-inline validate signup">
                        <div class="form-group">
                            <input type="text" class="form-control" name="sld" placeholder="Find a domain">
                            <input type="text1" class="form-control" name="tld" placeholder="com">
                        </div>
                        <input type="submit" name="submit" value="Search" class="btn btn-theme">
                    </form>
                    <br/>
                </div>
                <div class="col-sm-12 align-center">
                    <ul class="social-network social-circle">
                        <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="#" class="icoGit" title="Github"><i class="fa fa-github"></i></a>
                        </li>
                        <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                </div>
            </div>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="http://downloads.mailchimp.com/js/jquery.form-n-validate.js"></script>
    <script>
        $(document).ready( function () {
            $('#wrapper').height($(document).height());
        });
    </script>

</body>

</html>
