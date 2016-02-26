<?php 
	$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
	file_put_contents('php://stderr', print_r("URL   URL", TRUE));
	file_put_contents('php://stderr', print_r($url, TRUE));
	$server = $url["host"];
	file_put_contents('php://stderr', print_r("SERVER", TRUE));
	file_put_contents('php://stderr', print_r($server, TRUE));
	$username = $url["user"];
	$password = $url["pass"];
	$db = substr($url["path"], 1);

?>