#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

function doRollback ($type,$package,$tier,$packageName){

        echo "Rollback Request received" . PHP_EOL;
        echo "TYPE: " . $type . PHP_EOL;
        echo "PACKAGE: " . $package . PHP_EOL;
        echo "TIER: " . $tier . PHP_EOL;
        echo "PACKAGE NAME: " . $packageName . PHP_EOL;

	

}


function doUpdate ($type,$package,$tier,$packageName){

        echo "Update Request received" . PHP_EOL;
        echo "TYPE: " . $type . PHP_EOL;
        echo "PACKAGE: " . $package . PHP_EOL;
        echo "TIER: " . $tier . PHP_EOL;
        echo "PACKAGE NAME: " . $packageName . PHP_EOL;


}

function doDeploy ($type,$package,$tier,$packageName){

	echo "Deploy Request received" . PHP_EOL;
	echo "TYPE: " . $type . PHP_EOL;
	echo "PACKAGE: " . $package . PHP_EOL;
	echo "TIER: " . $tier . PHP_EOL;
	echo "PACKAGE NAME: " . $packageName . PHP_EOL;

	echo "Installing " . $packageName . " on " . $tier ." " . $package;
	# execute shell script to install backend package

}


function doBundle ($type,$package,$tier,$packageName){

        echo "Bundle Request received" . PHP_EOL;
        echo "TYPE: " . $type . PHP_EOL;
        echo "PACKAGE: " . $package . PHP_EOL;
        echo "TIER: " . $tier . PHP_EOL;
        echo "PACKAGE NAME: " . $packageName . PHP_EOL;

        echo "SCP INITIATED: ";

}


function requestProcessor($request)
{
  echo "received request".PHP_EOL;
  var_dump($request);
  if(!isset($request['type']))
  {
    return "ERROR: unsupported message type";
  }
  switch ($request['type'])
  {
    case "rollback":
      return doRollback($request['type'],$request['package'],$request['tier'],$request['packageName']);
    case "update":
      return doUpdate($request['type'],$request['package'],$request['tier'],$request['packageName']);
    case "deploy":
      return doDeploy($request['type'],$request['package'],$request['tier'],$request['packageName']);
    case "bundle":
      return doBundle($request['type'],$request['package'],$request['tier'],$request['packageName']);
  }
  return array("returnCode" => '0', 'message'=>"Server received request and processed");
}



$server = new rabbitMQServer("deployrabbitMQServer.ini","testServer");

echo "DeploySystem Server BEGIN".PHP_EOL;
$server->process_requests('requestProcessor');
echo "DeploySystem Server END".PHP_EOL;
exit();
?>
