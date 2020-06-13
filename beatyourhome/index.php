<?php 
$header = json_encode(['typ' => 'JWT', 'alg' => 'HS256']);

$payload = json_encode(['ip_address' => $_SERVER['REMOTE_ADDR']]);

$base64UrlHeader = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));

$base64UrlPayload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payload));

$signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, 'abC123!', true);

$base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));

$jwt = $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;
if(!isset($_COOKIE['home']))
{
	global $ip;
	setcookie("home",$jwt);
}
else
{
	$jwt_cookie = $_COOKIE['home'];
	$dist = explode(".",$jwt_cookie);
	$i= base64_decode($dist[1]);
	if($i=='{"ip_address":"127.0.0.1"}')
	{
		 echo "<center><h3 style='color:green;'>gotchaaaa!! Flag : noob{!_L!k3_my_h0m3}</h3></center>";   	
	}
		
}
?>

<center>
	<h1>Saf3ty F!rst!!!!!!! Be at your h0me...</h1>
	<img src="home.jpeg">
	<form method="POST" name="myhome">
		<input type="hidden" name="ip" value="127.0.0.1">
	</form>
</center>