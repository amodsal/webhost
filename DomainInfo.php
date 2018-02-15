<?php

//include the required files
require_once('includes/config.php');
require_once('classes/reseller_api.php');

//initialise the base reseller_api object
$reseller_api = new reseller_api();

//construct the request data
$request = array(
	'DomainName' => 'domaintocreate001.com'
);

//send the request
$response = $reseller_api->call('DomainInfo', $request);

if (!is_soap_fault($response)) {

	//Successfully created the domain
	if (isset($response->APIResponse->DomainDetails)) {
		echo $response->APIResponse->DomainDetails->DomainName . ' expires ' . $response->APIResponse->DomainDetails->Expiry;
	} else {
		echo 'The following error(s) occurred:<br />';

		foreach ($response->APIResponse->Errors as $error) {
			echo $error->Item . ' - ' . $error->Message . '<br />';
		}
	}
} else {

	//SoapFault
	echo 'Error occurred while sending request: ' . $response->getMessage();
}
?>