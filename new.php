<?php
$amount=35000;


// create curl resource
$ch = curl_init();

// set url
curl_setopt($ch, CURLOPT_URL, "https://blockchain.info/merchant/01095130-dc3b-4ad3-88f7-50f1db5d4bdf/payment?password=betcoin123&address=19PsY1Mxru4VW8Ng7MwyWfQRzcW1CHVo9h&amount=".$amount);

//return the transfer as a string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// $output contains the output string
$output = curl_exec($ch);
print_r($output);

// close curl resource to free up system resources
curl_close($ch);      
?>
