<html>
<head>
  
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Sumcoin | Mining - [SUM]</title>
  <meta property="og:locale" content="en_US" />
  <meta property="og:type" content="website" />
  <meta name="description" content="Sumcoin Mining">
  <meta name="keywords" content="sumcoin, mining, pool, sum, bitcoin, btc, crypto">
  <meta name="author" content="Sumcoin">
  <meta property="og:url" content="https://Sumcoinmining.org/" />
  <meta property="og:site_name" content="Sumcoin |  Mining - [SUM]" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta property="og:image" content="https://user-images.githubusercontent.com/57389504/68647883-35ca7b80-04dc-11ea-93fb-246720f7ac53.png" />
  <meta property="og:image:secure_url" content="https://user-images.githubusercontent.com/57389504/68647883-35ca7b80-04dc-11ea-93fb-246720f7ac53.png" />

</head>

</html>
<?php

//define('YII_DEBUG', true);

require_once('serverconfig.php');
require_once('yaamp/defaultconfig.php');
require_once('yaamp/ui/app.php');

//$_SERVER['PATH_INFO'] = $_SERVER['REQUEST_URI'];

// blacklist some search bots which ignore robots.txt (most in fact)
$isbot = false; $agent = arraySafeVal($_SERVER,'HTTP_USER_AGENT','');
if (strpos($agent, 'MJ12bot') || strpos($agent, 'DotBot') || strpos($agent, 'robot'))
	$isbot = true;
else if (strpos($agent, 'AhrefsBot') || strpos($agent, 'YandexBot') || strpos($agent, 'Googlebot'))
	$isbot = true;

if ($isbot) {
	$url = arraySafeVal($_SERVER,'REQUEST_URI');
	if (strpos($url, "explorer"))
		throw new CHttpException(403,"You are not wanted on this server. see robots.txt");
	die();
}

try
{
	$app->run();
}

catch(CException $e)
{
//	Javascript("window.history.go(-1)");
//	mydump($e, 3);

	debuglog("front end error ".$_SERVER['REMOTE_ADDR']);
	debuglog($e->getMessage());

//	send_email_alert('frontend', "frontend error", "a frontend error occured");
}


