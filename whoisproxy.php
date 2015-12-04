<?php

require_once( "lib/sdk/DonDominioAPI.php" );

$config_file = @file_get_contents( __DIR__ . '/config.json' );

$config = json_decode( $config_file, true );

$options = array(
	'endpoint' => 'https://simple-api.dondominio.net',
	'apiuser' => $config['apiUsername'],
	'apipasswd' => $config['apiPassword'],
	'autoValidate' => true,
	'versionCheck' => true,
	'response' => array(
		'throwExceptions' => true
	),
	'userAgent' => array(
		'WhoisProxyAddonForWHMCS' => '1.0'
	)
);

try{
	$dondominio = new DonDominioAPI( $options );
}catch( \DonDominioAPI_Error $e ){
	die( $e->getMessage());
}

try{
	$whois = $dondominio->domain_check( $_REQUEST['domain'] );
}catch( \DonDominioAPI_Error $e ){
	die( $e->getMessage());
}

$domain = $whois->get( "domains" )[0];

if( $domain['available'] ){
	die( "DDAVAILABLE" );
}else{
	die( "Not Available" );
}

?>