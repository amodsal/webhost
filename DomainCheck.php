<?php

//include the required files
require_once('includes/config.php');
require_once('classes/reseller_api.php');

//initialise the base reseller_api object
$reseller_api = new reseller_api();

//construct the request data
$request = array(
	'DomainNames' => array(
		'domaintocheck001.com',
		'domaintocheck002.com.au',
		'domaintocheck003.tv',
		'domaintocheck004.co.uk',
		'domaintocheck005.org'
	)
);

//send the request
$response = $reseller_api->call('DomainCheck', $request);

if (!is_soap_fault($response)) {

	//Successfully checked the availability of the domains
	if (isset($response->APIResponse->AvailabilityList)) {
		echo $response->APIResponse->AvailabilityList[0]->Item . ' - is ';

		if (!$response->APIResponse->AvailabilityList[0]->Available) {
			echo 'not ';
		}

		echo 'available<br />';
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