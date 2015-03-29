<?php

$guid="16uTYASJWPUH67tb2bJh2QogZ7PE1QGk5K";
$firstpassword="betcoin123";
$secondpassword="betcoin1234";
$amounta = "1";
$addressa = "19PsY1Mxru4VW8Ng7MwyWfQRzcW1CHVo9h";
$recipients = urlencode('{
"'.$addressa.'": '.$amounta.'
																		}');

$json_url = "https://blockchain.info/merchant/$guid/sendmany?password=$firstpassword&second_password=$secondpassword&recipients=$recipients";

$json_data = file_get_contents($json_url);

$json_feed = json_decode($json_data);

$message = $json_feed->message;
$txid = $json_feed->tx_hash;

?>
