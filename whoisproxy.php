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
	$whois = $dondominio->domain_whois( $_REQUEST['domain'] );
}catch( \DonDominioAPI_Domain_WhoisError $e ){
	die( "DDAVAILABLE" );
}catch( \DonDominioAPI_Domain_NotFound $e ){
	die( "DDAVAILABLE" );
}catch( \DonDominioAPI_Error $e ){
	die( $e->getMessage());
}

die( $whois->get( 'whoisData' ));

?>