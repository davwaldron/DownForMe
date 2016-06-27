
<?php
# populate the relevant variables from the POST
$command = $_POST['command'];
$text = $_POST['text'];
$token = $_POST['token'];

# Check the token to ensure the request is coming from the correct Slack Team
if($token != 'I1AyhiwvljhJsf34v5oqMr5M'){ #replace this with the token from your slash command configuration page
  $msg = "The token for the slash command doesn't match. Check your script.";
  die($msg);
}

# Create and populate the cURL session
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://downforeveryoneorjustme.com/" . $text);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERAGENT, "DownForMe/1.0 (https://github.com/davwaldron/DownForMe; dav@davwaldron.com)");

$ch_response = curl_exec($ch);

# Was there an error?  Post it back
if (curl_error($ch)) {
	echo "Error - " . curl_error($ch) ;
	}

# So what was the result?  We read the text of the returned response for a string that says it's down
# otherwise we return a positive.
if((strpos($ch_response, "looks down from here")) !== false ) {
    $msg = "That site is down";
	}
elseif((strpos($ch_response, "interwho")) !== false ) {
	$msg = "That doesn't appear to be a valid website address" ;
	}
else { $msg = "Looks like that site is up"; }

echo $msg;

curl_close($ch);
?>
