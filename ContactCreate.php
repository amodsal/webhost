<?php

//include the required files
require_once('includes/config.php');
require_once('classes/reseller_api.php');

//initialise the base reseller_api object
$reseller_api = new reseller_api();

//construct the request data
$request = array(
	'FirstName' => 'John',
	'LastName' => 'Smith',
	'Address' => '123 Example St',
	'City' => 'Testville',
	'Country' => 'AU',
	'State' => 'WA',
	'PostCode' => '6001',
	'CountryCode' => '61',
	'Phone' => '891234567',
	'Mobile' => '',
	'Email' => 'email@example.com',
	'AccountType' => 'personal'
);

//send the request
$response = $reseller_api->call('ContactCreate', $request);

if (!is_soap_fault($response)) {

	//Successfully created the contact
	if (isset($response->APIResponse->ContactDetails)) {
		echo 'Contact ID: ' . $response->APIResponse->ContactDetails->ContactIdentifier;
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