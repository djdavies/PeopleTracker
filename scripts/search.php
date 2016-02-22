<?php
require 'debugBar.php';
$query = 'Daniel%20Davies%20cardiff%20university';

// Looping it will fetch me more than 8 results, but contain duplicates.
// for ( $i= 1; $i < 100; $i+8 ) {
	$url = "http://ajax.googleapis.com/ajax/services/search/web?v=1.0&rsz=large&start=0&q==".$query;
	$body = file_get_contents($url);
	$json = json_decode($body);

	for($x=0;$x<count($json->responseData->results);$x++){

		echo "<b>Result ".($x+1)."</b>";
		echo "<br>URL: ";
		echo $json->responseData->results[$x]->url;
		echo "<br>VisibleURL: ";
		echo $json->responseData->results[$x]->visibleUrl;
		echo "<br>Title: ";
		echo $json->responseData->results[$x]->title;
		echo "<br>Content: ";
		echo $json->responseData->results[$x]->content;
		echo "<br><br>";

	}
// 	$i+=8;
// }

?>