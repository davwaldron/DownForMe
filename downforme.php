
<?php
# populate the relevant variables from the POST
$command = $_POST['command'];
$text = $_POST['text'];
$token = $_POST['token'];

$ch = curl_init();

# Check the token and make sure the request is from our team 
if($token != 'I1AyhiwvljhJsf34v5oqMr5'){ #replace this with the token from your slash command configuration page
  $msg = "The token for the slash command doesn't match. Check your script.";
  die($msg);
  echo $msg;
}

curl_setopt($ch, CURLOPT_URL, "http://downforeveryoneorjustme.com/" . $text);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERAGENT, "IsitupForSlack/1.0 (http://github.com/mccreath/istiupforslack; mccreath@gmail.com)");
$ch_response = curl_exec($ch);

# echo "The response was of length - " . strlen($ch_response) . "<br>\n";
# echo "The response was  - " . $ch_response;
if (curl_error($ch)) {echo "Error - " . curl_error($ch) . "<br>\n"; }

if((strpos($ch_response, "looks down from here")) !== false )
{
    echo "That site is down";
}
else
{
    echo "Looks like that site is up";
}

#if preg_match("unable to connect to the website", $ch_response) {echo "that site is down";else(echo"that site is up";}

curl_close($ch);
?>