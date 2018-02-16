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

                    //include the required files
                    require_once('includes/config.php');
                    require_once('classes/reseller_api.php');

                    //initialise the base reseller_api object
                    $reseller_api = new reseller_api();

                    //construct the request data
                    $request = array(
                        'DomainNames' => array(
                            $_POST['domainname']
                        )
                    );

                    //send the request
                    $response = $reseller_api->call('DomainCheck', $request);

                    if (!is_soap_fault($response)) {

                        //Successfully checked the availability of the domains
                        if (isset($response->APIResponse->AvailabilityList)) {
                            echo '<h2 class="subtitle">'. $response->APIResponse->AvailabilityList[0]->Item . ' - is ';

                            if (!$response->APIResponse->AvailabilityList[0]->Available) {
                                echo 'not ';
                            }

                            echo 'available</h2><br />';
                        } else {
                            echo '<h2 class="subtitle">The following error(s) occurred:<br />';

                            foreach ($response->APIResponse->Errors as $error) {
                                echo $error->Item . ' - ' . $error->Message . '</h2><br />';
                            }
                        }
                    } else {

                        //SoapFault
                        echo '<h2 class="subtitle">Error occurred while sending request: ' . $response->getMessage() . '</h2>';
                    }
                    ?>
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