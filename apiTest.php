#!/usr/bin/php
<?php

echo "Number: 1 For Movie Search or 2 for TV Show\n";

$number = readline("Enter one number from above: ");
if ($number == "1") {
	$input = readline("Movie: ");
	$moviename = preg_replace('/\s+/', '+',$input);


	$ch = curl_init("https://api.themoviedb.org/3/search/movie?api_key=a99025c572bede9218ee420b5c9f4cc4&language=en-US&query=" . $moviename . "&page=1&include_adult=false");
	$fp = fopen("apidata.txt", "w+");

	curl_setopt($ch, CURLOPT_FILE, $fp);
	curl_setopt($ch, CURLOPT_HEADER, 0);

	curl_exec($ch);
	curl_close($ch);
	fclose($fp);

	

}else{

	$input2 = readline("TV Show: ");
	$showname = preg_replace('/\s+/', '+',$input2);


	$ch = curl_init("https://api.themoviedb.org/3/search/tv?api_key=a99025c572bede9218ee420b5c9f4cc4&language=en-US&query=" . $showname . "&page=1");
	$fp = fopen("apidata.txt", "w+");

	curl_setopt($ch, CURLOPT_FILE, $fp);
	curl_setopt($ch, CURLOPT_HEADER, 0);

	curl_exec($ch);
	curl_close($ch);
	fclose($fp);

}

?>



