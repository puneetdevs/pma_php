<?php
// load library
require "../../src/lib_pathomation.php"; 	// PMA.php library
require "../lib_config.php"; 				// only needed for the purpose of these demos

use Pathomation\Core;

$sessionID = Core::Connect($pma_core_server, $pma_core_user, $pma_core_pass);

if ($sessionID == null) {
	echo "Unable to connect to PMA.core at specified location ($pma_core_server)";
} else {
	echo "Successfully connected to $pma_core_server".$newline;
	echo "You have the following root-directories at your disposal:".$newline;
	foreach (Core::getRootDirectories($sessionID) as $rd) {
		echo $rd.$newline;
	}
	Core::disconnect($sessionID);  // not always needed in a PHP context; depends on whether the client (e.g. browser) still needs to SessionID as well
}
?>
