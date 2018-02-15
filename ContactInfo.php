<?php

//include the required files
require_once('includes/config.php');
require_once('classes/reseller_api.php');

//initialise the base reseller_api object
$reseller_api = new reseller_api();

//construct the request data
$request = array(
	'ContactIdentifier' => 'C-000982915-SN'
);

//send the request
$response = $reseller_api->call('ContactInfo', $request);

if (!is_soap_fault($response)) {

	//Successfully created the domain
	if (isset($response->APIResponse->ContactDetails)) {
		echo 'Contacts name is ' . $response->APIResponse->ContactDetails->FirstName . ' ' . $response->APIResponse->ContactDetails->LastName;
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