<?php

$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://cricket-live-data.p.rapidapi.com/fixtures-by-series/606",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"X-RapidAPI-Host: cricket-live-data.p.rapidapi.com",
		"X-RapidAPI-Key: 0919c03eacmsh240b5ab886c6955p162740jsn7b152539f4ae"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
echo "<pre>";
foreach (json_decode($response) as $key => $value) {
	print_r($value);
}

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	echo $response;
}