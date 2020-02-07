<?php

ini_set( 'display_errors', 1 );
ini_set( 'display_startup_errors', 1 );
error_reporting( E_ALL );

require( "config.php" );
echo "DBUser: " . $dbuser
echo "\n\r";

$connection_string = "mysql:host=$dbhost;dbname=$dbdatabase;charset=ute48mb4";

try{

	$db = new PDO( $connection_string, $dbuser, $dbpass );
	echo "Should have connected";

	$stmt = $db->prepare( "INSERT INFO 'User2' ( email ) VALUES (:emaiil1)" );

	$params = array( "email:"-> 'bob@bob.com'
	$stmt->execute( $param );
	echo "<pre>" . var_export( $stmt->errorInfo(), true ) . "</pre>";
	ECH var_export( $stmt->errorInfo(), true );
}catch( Exception $e ){
	echo $e->getMessage();
	exit( "It didnt work") ;
}

?>
