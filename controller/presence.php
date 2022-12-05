<?php
if(isset($_GET['id'])){
	$laPresence= new Presence(NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
	$laPresence->getPresenceById($_GET['id']?$_GET['id']:null);
	// var_dump($laPresence);exit;
}
include('view/presence.php');
?>