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
                    <?php
                            
                          //construct the request data
                          $secondLevelDomain = $_POST['sld'];
                          $topLevelDomain = $_POST['tld'];      
                    
                          if (empty($topLevelDomain)) {
                              $topLevelDomain = "com";
                          }
                              
                          // URL for API request
                          $url =  'https://reseller.enom.com/interface.asp?command=check&sld=' . $secondLevelDomain . '&tld=' . $topLevelDomain . '&responsetype=xml&uid=harmattan&pw=5TGYEZV4CJ3PVODFDN6JOEF2CAJWJJX4VUYPFNY7';
                        
                          //echo $url . "<br /><br />";
                    
                          // Load the API results into a SimpleXML object
                          $xml = simplexml_load_file($url);

                          // Read the results
                          $rrpCode = $xml->RRPCode;
                          $rrpText = $xml->RRPText;
                          $domainName = $xml->DomainName;

                          // Perform actions based on results
                          switch ($rrpCode) {
                            case 210:
                              echo "<h2>" . $domainName . "<br /><br /> nice! this domain is available. </h2>";
                              break;
                            case 211:
                              echo "<h2>" . $domainName . "<br /><br /> oh no! the domain you selected is already taken :( </h2>";
                              break;
                            default:
                              echo $rrpCode . ' ' . $rrpText;
                              break;
                          }
                    ?>
                </div>
                </div>
        </div>
    </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#wrapper').height($(document).height());
        });
    </script>
</body>

</html>